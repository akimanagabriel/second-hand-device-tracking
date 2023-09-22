<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "sn",
        "user_id",
        "category",
        "brand",
        "status",
    ];
}
