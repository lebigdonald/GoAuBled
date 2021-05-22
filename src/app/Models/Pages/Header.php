<?php

namespace App\Models\Pages;

use App\Models\ImageUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Header extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image()
    {
        return $this->MorphOne(ImageUpload::class, 'imageable');
    }
}
