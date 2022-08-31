<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'co_author',
        'title_th',
        'title_en',
        'edition',
        'article',
        'abtract',
        'adviser',
        'co_adviser',
        'branch',
        'cate_id',
        'gen',
    ];

    protected $primaryKey = "project_id";

    protected $table='projects';
}
