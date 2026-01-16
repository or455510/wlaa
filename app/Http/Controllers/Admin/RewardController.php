<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;

class RewardController extends Controller
{
    // Show all rewards
    public function index()
    {
        $rewards = Reward::all();
        return view('admin.rewards.index', compact('rewards'));
    }

    // Show form to create a reward
    public function create()
    {
        return view('admin.rewards.create');
    }

    // Store a new reward
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points_required' => 'required|integer|min:0',
            'image_url' => 'nullable|url',
        ]);

        Reward::create($request->all());

    return redirect()->route('admin.rewards.index')->with('success', 'Reward created!');

    }

    // Show form to edit a reward
    public function edit(Reward $reward)
    {
        return view('admin.rewards.edit', compact('reward'));
    }

    // Update a reward
    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points_required' => 'required|integer|min:0',
            'image_url' => 'nullable|url',
        ]);

        $reward->update($request->all());

        return redirect()->route('admin.rewards.index')
                         ->with('success', 'Reward updated successfully.');
    }

    // Delete a reward
    public function destroy(Reward $reward)
    {
        $reward->delete();

        return redirect()->route('admin.rewards.index')
                         ->with('success', 'Reward deleted successfully.');
    }
}
