<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSentence extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language', 'language');
    }
}
