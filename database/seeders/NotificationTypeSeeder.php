<?php

namespace Database\Seeders;

use App\Models\NotificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotificationType::create([
            'name' => 'Email',
        ]);

        NotificationType::create([
            'name' => 'SMS',
        ]);

        NotificationType::create([
            'name' => 'Push Notification',
        ]);
    }
}
