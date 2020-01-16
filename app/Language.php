<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public function translate_sentences()
    {
        return $this->belongsTo(TranslateSentence::class);
    }
}
