<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'naam',
        'itemcatagory',
        'prijs'
    ];
    public $timestamps = false;
}
