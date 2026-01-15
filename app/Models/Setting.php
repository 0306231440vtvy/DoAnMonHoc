<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'logo',
        'facebook_url',
        'youtube_url',
        'instagram_url',
        'linkedin_url',
        'copyright',
        'publish'
    ];
}
