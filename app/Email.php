<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';
//  protected $guarded = ['id'];
    protected $fillable = ['category_id', 'email', 'created_at'];

    public function category() {
        return $this->belongsTo(Category::class, "id", "category_id");
    }


}
