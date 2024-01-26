<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_description',
        'member_name',
        'member_role',
        'member_message',
        'image',
        'address',
        'phone_number',
        'email',
    ];
}
