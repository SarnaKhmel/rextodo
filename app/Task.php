<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'email_us', 'time'
    ];

    protected $casts = [
        'user_id' => 'int',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

