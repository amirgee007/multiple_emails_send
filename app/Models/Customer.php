<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
  protected $guarded = [];


    public function sentEmails(){
        return $this->hasMany(sentEmail::class , 'id' , 'customer_id');
    }



}
