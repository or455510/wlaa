<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward; // النموذج بتاع الجوائز

class RewardController extends Controller
{
    // عرض كل الجوائز
    public function index()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }
    public function create()
{
    return view('rewards.create');
}

public function edit(Reward $reward)
{
    return view('rewards.edit', compact('reward'));
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'points_required' => 'required|integer',
        'image_url' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image_url')) {
        $data['image_url'] = $request->file('image_url')->store('rewards', 'public');
    }

    Reward::create($data);

    return redirect()->route('rewards')->with('success', 'Reward added successfully!');
}

public function update(Request $request, Reward $reward)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'points_required' => 'required|integer',
        'image_url' => 'nullable|image |max:2048 ',
    ]);

    $data = $request->all();

    if ($request->hasFile('image_url')) {
        $data['image_url'] = $request->file('image_url')->store('rewards', 'public');
    }

    $reward->update($data);

    return redirect()->route('rewards')->with('success', 'Reward updated successfully!');
}
public function destroy(Reward $reward)
{
    $reward->delete();
    return redirect()->route('rewards')->with('success', 'Reward deleted successfully!');
}

}
