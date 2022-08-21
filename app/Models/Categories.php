<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'catename',
    ];
    
    protected $primaryKey = "cate_id";
    // rest of your class

    protected $table = "categories";
    
    
}
