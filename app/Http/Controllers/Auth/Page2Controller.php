<?php

namespace App\Http\Controllers\auth;

use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Page2Controller extends Controller{


    public function uni()
{
    $universities = University::all();  // تجيب كل الجامعات

    return view('universities', compact('universities'));
}



public function myUniversity()
{
    $user = auth()->user();

    if (!$user || !$user->student || !$user->student->university) {
        // لو ما في جامعة مرتبطة، ممكن ترجع صفحة خطأ أو رسالة
        return redirect()->back()->with('error', 'لم يتم ربط الجامعة بحسابك بعد');
    }

    $university = $user->student->university;

    return view('universitiesShow', compact('university'));
}


}