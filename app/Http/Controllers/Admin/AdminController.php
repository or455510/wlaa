<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Reward;
use App\Models\Redemption;

class AdminController extends Controller
{

    public function dashboard()
    {
        // حسابات المستخدمين والمكافآت والاستبدالات
        $totalUsers = User::count();
        $totalRewards = Reward::count();
        $totalRedemptions = Redemption::count();

        // بيانات الرسم البياني
        $pending = Redemption::where('status', 'pending')->count();
        $used = Redemption::where('status', 'used')->count();
        $expired = Redemption::where('status', 'expired')->count();

        $chartData = [
            'pending' => $pending,
            'used' => $used,
            'expired' => $expired,
        ];

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalRewards',
            'totalRedemptions',
            'chartData'
        ));
    }



    // لو عايز approve/reject
    public function approve($id)
    {
        $redemption = Redemption::findOrFail($id);
        $redemption->status = 'used';
        $redemption->save();

        return redirect()->back()->with('success', 'Redemption approved.');
    }

    public function reject($id)
    {
        $redemption = Redemption::findOrFail($id);
        $redemption->status = 'pending';
        $redemption->save();

        return redirect()->back()->with('success', 'Redemption rejected.');
    }
}
