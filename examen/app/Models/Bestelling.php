<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\resevering;


class Bestelling extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'resevering_id',
        'menuitem_code',
        'menuitem_catagory',
        'hoeveelheid',
        'prijs_menuitem'
    ];

    public function resevering()
    {
        return $this->belongsTo(resevering::class);
    }
}
