<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User2Controller extends Controller
{

    // عرض صفحة تعديل الملف الشخصي
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    // تحديث بيانات المستخدم
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'bio' => $request->bio,
        ]);

        return redirect()->back()->with('status', 'تم تحديث البيانات بنجاح!');
    }
}
