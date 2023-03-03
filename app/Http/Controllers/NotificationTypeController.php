<?php

namespace App\Http\Controllers;

use App\Models\NotificationType;
use Illuminate\Http\Request;

class NotificationTypeController extends Controller
{
    public function list()
    {
        return NotificationType::all();
    }
}
