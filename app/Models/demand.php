<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demand extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah_demand'];
}