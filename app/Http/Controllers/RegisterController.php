<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'handle' => 'required|string',
            'group' => 'string',
            'country' => 'required|string'
        ]);

        $registration = Registration::create([
            'handle' => $request['handle'],
            'group' => $request['group'],
            'country' => $request['country']
        ]);

        $registration->save();

        return response()->json([
            'message' => 'Registration successful!'
        ], 201);
    }
}