<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class JobListing extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'salary',
        'url',
        'external_id',
        'source',
    ];
}
