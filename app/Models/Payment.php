<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'card_number',
        'amount',
        'user_id'
    ];
}