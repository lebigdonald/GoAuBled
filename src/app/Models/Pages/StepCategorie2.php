<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StepCategorie2 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class, 'step_categories_id');
    }
}
