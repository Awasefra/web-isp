<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Update Password';
        return view('sales.update_password', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(([
            'current_password' =>'required',
            'password'         =>'required|min:8|confirmed',

        ]));
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password'=>Hash::make($request->password)]);            
            return back()->with('alert', 'Your password hasbeen updated');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Your Current Passwrod Doesnt match'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
