<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\Subscriber;

class NewsletterController extends Controller
{

public function subscribe(Request $request) {
    $request->validate(['email' => 'required|email|unique:subscribers,email']);
    Subscriber::create(['email' => $request->email]);
    return response()->json(['message' => 'Subscribed successfully']);
}

}
