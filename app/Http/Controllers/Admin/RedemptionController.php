<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Redemption;

class RedemptionController extends Controller
{
    public function index()
    {
        $redemptions = Redemption::with('reward', 'user')->get();
        return view('admin.redemptions.index', compact('redemptions'));
    }

public function edit(Redemption $redemption)
{
    return view('admin.redemptions.edit', [
        'redeem' => $redemption
    ]);
}

public function update(Request $request, Redemption $redemption)
{
    $redemption->status = $request->status;
    $redemption->save();

    return redirect()->route('redemptions.index')->with('success', 'Updated successfully');
}

    public function destroy(Redemption $redemption)
    {
        $redemption->delete();
        return redirect()->route('redemptions.index')->with('success', 'Redemption deleted!');
    }
}
