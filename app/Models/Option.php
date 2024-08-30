<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Belongsto;
use Illuminate\Database\Eloquent\Relations\Hasmany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function poll(): BelongsTo #modelo filho
    {
        return $this->belongTo(Poll::class); #retorna uma referencia(this) do Belongsto(poll)
    }

    public function votes(): HasMany #modelo pai
    {
        return $this->hasMany(Vote::class);
    }
}
