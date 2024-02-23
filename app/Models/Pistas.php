<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pistas extends Model
{
    use HasFactory;
    public function deporte()
    {
        return $this->belongsTo(Deportes::class);
    }
    public function reservas()
    {
        return $this->hasMany(Reservas::class);
    }
}
