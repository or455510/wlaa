<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoyaltyPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */


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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function index() {
    $points = LoyaltyPoint::with('user')->latest()->paginate(20);
    return view('admin.loyalty.index', compact('points'));
}

public function store(Request $request) {
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'points' => 'required|integer|min:1',
        'activity' => 'nullable|string|max:255'
    ]);

    LoyaltyPoint::create($request->all());

    return redirect()->back()->with('success', 'Points added successfully');
}

}
