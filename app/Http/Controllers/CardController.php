<?php

namespace App\Http\Controllers;

use App\Card;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show($id)
    {
        return view('portrait-card', ['card' => Card::findOrFail($id)]);
    }
}
