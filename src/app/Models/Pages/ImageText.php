<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 */
class ImageText extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function modeable()
    {
        return $this->morphTo();
    }
}
