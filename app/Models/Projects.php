<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'co_auther',
        'title_th',
        'title_en',
        'edition',
        'article',
        'abtract',
        'adviser',
        'branch',
        'published',
        'view_counter',
        'cate_id',
    ];
}
