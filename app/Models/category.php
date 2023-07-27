<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
    'codigo', 
    'nombre', 
    'n_id', 
    ];
    
    public function owner()
    {
    return $this->belongsTo(User::class, 'n_id'); 
    }

    public function project()
    {
    return $this->hasMany(project::class, 'n_id');
    }

       
}
