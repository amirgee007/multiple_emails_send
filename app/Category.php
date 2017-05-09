<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
//  protected $guarded = ['id'];
    protected $fillable = ['title', 'added_by', 'created_at'];


    public function emails(){
        return $this->hasMany('App\Email'  , 'id' , 'category_id');
    }

    public function sentEmails(){
        return $this->hasMany('App\SentEmail'  , 'id' , 'category_id');
    }



}
