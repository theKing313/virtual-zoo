<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    protected $fillable = ['name', 'capacity'];
    use HasFactory;
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
