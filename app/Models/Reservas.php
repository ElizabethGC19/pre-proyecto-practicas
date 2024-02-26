<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'socio_id',
        'pista_id',
    ];
    public function pista()
    {
        return $this->belongsTo(Pistas::class, 'pista_id', 'id');
    }
    public function socio()
    {
        return $this->belongsTo(Socios::class, 'socio_id', 'id');
    }

}
