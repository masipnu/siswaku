<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RahasiaController extends Controller
{
    public function halamanRahasia(){
        return 'Anda sedang melihat halaman <b>Rahasia</b>.';
    }

    public function showMeSecret(){
        $url = route('secret');
        $link = '<a href="'.$url.'">Ke halaman rahasia</a>';
        return $link;
    }
}