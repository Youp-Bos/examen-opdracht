<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class resevering extends Model
{
    use HasFactory;

    protected $fillable = [
        'datum',
        'tijd',
        'tafel',
        'naam',
        'telefoonnummer',
        'aantal',
        'allergien',
        'opmerkingen',
        'status'
    ];

    public function bestellingen()
    {
        return $this->hasMany(Bestelling::class);
    }

}
