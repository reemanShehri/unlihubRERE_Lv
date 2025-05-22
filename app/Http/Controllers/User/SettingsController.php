<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user(); // المستخدم الحالي
        return view('user.Settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // التحقق من المدخلات
        $request->validate([

        'name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.auth()->id(),
        'bio' => 'nullable|string',        ]);

        // تحديث البيانات
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bio' => $request->bio,
             
        ]);

        return redirect()->route('user.settings.index')->with('success', 'Settings updated successfully!');
    }
}
