<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslateSentence extends Model
{
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language', 'language');
    }
}
