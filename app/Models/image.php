<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Image extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'fileName',
        'path'
    ];

    public function contato(): HasOne
    {
        return $this->hasOne(Produto::class, 'id', 'image_id');
    }
}
