<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['course'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
