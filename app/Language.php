<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public function translate_sentences()
    {
        return $this->hasMany(TranslateSentence::class, 'language', 'language');
    }
    public function translate_words()
    {
        return $this->hasMany(TranslateWord::class, 'language', 'language');
    }
    public function order_sentences()
    {
        return $this->hasMany(OrderSentence::class, 'language', 'language');
    }
    public function choose_translations()
    {
        return $this->hasMany(ChooseTranslation::class, 'language', 'language');
    }
    public function choose_pictures()
    {
        return $this->hasMany(ChoosePicture::class, 'language', 'language');
    }
}
