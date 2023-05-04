<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contato extends Model
{
    use HasFactory;

  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class, 'id', 'user_id');
  }

  public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'id', 'user_id');
    }
}
