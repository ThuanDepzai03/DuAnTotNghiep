<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'last_message_at',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
