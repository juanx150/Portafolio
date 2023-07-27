<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
    'foto', 
    'propietario', 
    'nombre',
    'descripcion',
    'tecnologias',
    'fechainicio',
    'fechafinal', 
    'n_id', 
    ];
    
    public function owner()
    {
    return $this->belongsTo(category::class, 'n_id'); 
    }

    public function comments()
    {
    return $this->hasMany(comments::class, 'n_id');
    }

}
