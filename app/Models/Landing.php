<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    protected $table = 'landing_pages';

    protected $fillable = ['name', 'lead', 'content', 'place', 'url'];
}
