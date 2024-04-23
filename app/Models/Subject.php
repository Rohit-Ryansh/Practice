<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Subject extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'course_id',
        'staff_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault('N/A');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'id')->withDefault('N/A');
    }
}
