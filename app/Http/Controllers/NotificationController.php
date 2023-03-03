<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notification;
use App\Models\UserHasChannel;
use App\Models\UserHasSubscription;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class NotificationController extends Controller
{
    public function list()
    {
        return Notification::with('notificationType')
        ->with('category')
        ->with('user')
        ->orderBy('id', 'desc')
        ->get();
    }

    public function addNotifications(Request $request, Category $category)
    {
        $notifications = [];
        $body = $request->validate([
            'message' => 'required',
        ]);

        $usersSubscribed = UserHasSubscription::where('category_id', '=', $category['id'])->get();

        if(!empty($usersSubscribed)) {
            foreach($usersSubscribed as $user) {
                $userHasChannels = UserHasChannel::where('user_id', '=', $user['user_id'])->get();
                if(!empty($userHasChannels)) {
                    foreach($userHasChannels as $channel) {
                        $body['user_id'] = $user['user_id'];
                        $body['category_id'] = $category['id'];
                        $body['notification_type_id'] = $channel['notification_type_id'];
                        $newNotification = Notification::create($body);
                        $notifications[] = Notification::find($newNotification['id']);
                    }
                }
            }
        }

        return array_reverse($notifications);
    }
}
