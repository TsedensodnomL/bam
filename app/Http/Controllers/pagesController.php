<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    function getIndex(){
        return view('index');
    }

    function getContact(){
        return view('pages.contact');
    }

    function getAbout(){
        return view('pages.about');
    }
    
    // function getUser(){
    //     return view('pages.user');
    // }
}