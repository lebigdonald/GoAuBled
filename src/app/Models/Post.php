<?php

namespace App\Models;

use App\Models\Post\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded;

    protected $appends = ['dateFrom','dateTo','Path','createdAt'];

    public function getDateFromAttribute(): string
    {
        return Carbon::parse($this->attributes['dateFrom'])->format('d.m.Y H:i');
    }
    public function getDateToAttribute(): string
    {
        return Carbon::parse($this->attributes['dateTo'])->format('d.m.Y H:i');
    }
    public function getPathAttribute (): string
    {
        return route('post.booking',['slug' => $this->attributes['slug'], 'user_id' => $this->attributes['user_id'] ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(ImageUpload::class, 'imageable');
    }

    public function getCreatedAtAttribute () {
        return $this->updated_at->diffForHumans();
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
