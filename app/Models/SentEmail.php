<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    protected $table = 'sent_emails';
  protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class, "sent_to", "id");
    }

}
