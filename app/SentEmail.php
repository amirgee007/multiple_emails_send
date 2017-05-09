<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    protected $table = 'sent_emails';
//  protected $guarded = ['id'];
    protected $fillable = ['category_id', 'email_address', 'content', 'created_at'];


    public function category() {
        return $this->belongsTo(Category::class, "id", "category_id");
    }

}
