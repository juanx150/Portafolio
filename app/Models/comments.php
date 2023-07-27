<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'mensaje', 
    'autor', 
    'fechapublicacion', 
    'n_id', 
    ];

    public function owner()
    {
    return $this->belongsTo(project::class, 'n_id'); 
    }

}
