<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    
    protected $fillable = [
        'notification_type_id',
        'category_id',
        'user_id',
        'message',
    ];

    protected $with = [
        'notificationType',
        'category',
        'user'
    ];

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class, 'notification_type_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
