<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deportes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];
    /**
     * Get the Pista that owns the Deportes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pista()
    {
        return $this->belongsTo(Pistas::class);
    }
}
