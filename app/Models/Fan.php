<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    use HasFactory;

    protected $table = "fans";

    protected $fillable = ["first_name", "last_name", "nick_name"];
}
