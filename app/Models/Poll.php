<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Hasmany;

class Poll extends Model
{
    use HasFactory;
    
    protected $fillable = ['title'];

    public function options(): HasMany #modelo pai
    {
        return $this->hasMany(Option::class);
    }
}
