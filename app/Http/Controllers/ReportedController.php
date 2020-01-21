<?php

namespace App\Http\Controllers;

use App\Reported;
use Illuminate\Http\Request;

class ReportedController extends Controller
{
    public function destroy(Reported $reported)
    {
        Reported::where('id', $reported->id)->delete();

        return redirect('/home');
    }
}
