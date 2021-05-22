<?php

namespace App\Models\Pages;

use App\Models\Pages\ImageText;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function header()
    {
        return $this->morphMany(ImageText::class, 'modelable');
    }


}
