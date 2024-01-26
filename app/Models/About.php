<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
   protected $fillable = [
    'company_history',
    'mission_vision',
    'address',
    'phone_number',
    'email'
   ];
}
