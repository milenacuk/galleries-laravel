<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class AuthAuthorController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    public function show(Request $request, $id){
        return Gallery::getGalleries($request, $id);
    }
}
