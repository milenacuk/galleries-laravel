<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;


class AuthorController extends Controller
{
    
    public function show(Request $request, $id){
        return Gallery::getGalleries($request, $id);
    }
}

