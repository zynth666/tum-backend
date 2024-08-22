<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

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

    public function getRegistrations()
    {
        $registrations = Registration::all();

        return response()->json($registrations, 200);
    }
}