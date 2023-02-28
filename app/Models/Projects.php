<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\visits;

class Projects extends Model
{
    /**
     * Get the instance of the user visits
     *
     * @return \Awssat\Visits\Visits
     */
    public function visitsCounter()
    {
        return visits($this);
    }

    /**
     * Get the visits relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function visits()
    {
        return visits($this)->relation();
    }
    use HasFactory;


    protected $fillable = [
        'author',
        'co_author',
        'email_author',
        'email_co_author',
        'tel_author',
        'tel_co_author',
        'title_th',
        'title_en',
        'edition',
        'abtract',
        'adviser',
        'co_adviser',
        'branch',
        'cate_id',
        'gen',
    ];

    protected $primaryKey = "project_id";

    protected $table='projects';

    public function documents(){
        return $this->hasMany(Document::class, 'project_id', 'project_id');
    }
    public function categories(){
        return $this->belongsTo(Categories::class, 'cate_id', 'cate_id');
    }
    public function advisers(){
        return $this->hasMany(advisers::class, 'adviser_id', 'adviser')->limit(1);
    }
    public function co_advisers(){
        return $this->hasMany(advisers::class, 'adviser_id', 'co_adviser')->limit(1);
    }
}
