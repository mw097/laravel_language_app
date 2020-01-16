<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoosePicture extends Model
{
    protected $table = "choose_pictures";
    protected $fillable = ['foreign', 'image_correct', 'image_1', 'image_2', 'image_3', 'language' ];
    //
}
