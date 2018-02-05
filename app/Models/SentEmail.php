<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    protected $table = 'sent_emails';
  protected $guarded = [];

    public function customers() {
        return $this->belongsTo(Customer::class, "id", "customer_id");
    }

}
