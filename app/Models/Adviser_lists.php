<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser_lists extends Model
{
    use HasFactory;
    public function advisers(){
        return $this->hasMany(advisers::class, 'adviser_id', 'adviser_id');
    }
}
