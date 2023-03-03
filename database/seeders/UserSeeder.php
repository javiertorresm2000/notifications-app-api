<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function (){
            $user = User::create([
                'name' => 'John William',
                'email' => 'john@gmail.com',
                'phone' => '5548963521'
            ]);
            $category1 = Category::find(1);
            $category2 = Category::find(2);
            $channel1 = NotificationType::find(1);
            $channel2 = NotificationType::find(2);
            $user->subscriptions()->attach($category1);
            $user->subscriptions()->attach($category2);
            $user->channels()->attach($channel1);
            $user->channels()->attach($channel2);
        });

        DB::transaction(function (){
            $user = User::create([
                'name' => 'Tom William',
                'email' => 'tom@gmail.com',
                'phone' => '5548963522'
            ]);
            $category2 = Category::find(2);
            $category3 = Category::find(3);
            $channel2 = NotificationType::find(2);
            $channel3 = NotificationType::find(3);
            $user->subscriptions()->attach($category2);
            $user->subscriptions()->attach($category3);
            $user->channels()->attach($channel2);
            $user->channels()->attach($channel3);
        });

        DB::transaction(function (){
            $user = User::create([
                'name' => 'Jerry Sams',
                'email' => 'jerry@gmail.com',
                'phone' => '5548963523'
            ]);
            $category1 = Category::find(1);
            $category2 = Category::find(2);
            $category3 = Category::find(3);
            $channel1 = NotificationType::find(1);
            $channel2 = NotificationType::find(2);
            $channel3 = NotificationType::find(3);
            $user->subscriptions()->attach($category1);
            $user->subscriptions()->attach($category2);
            $user->subscriptions()->attach($category3);
            $user->channels()->attach($channel1);
            $user->channels()->attach($channel2);
            $user->channels()->attach($channel3);
        });
    }
}
