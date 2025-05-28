<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\College;
use Illuminate\View\View;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */



// public function edit(Request $request): View
// {
//     $universities = University::select('id', 'name')->get();
//     $colleges = College::select('id', 'name')->get();
//     $university_id = $request->user()->student->university_id; // Define $university_id
//     $majors = Major::whereHas('college', function ($query) use ($university_id) {
//         $query->where('university_id', $university_id);
//     })->get();
//         $user = $request->user();
//     $student = $user->student;

//     return view('profile.edit', [
//         'user' => $user, // بيانات المستخدم (name, email)
//         'student' => $student, // بيانات الطالب (university_id, college_id,...)
//         'universities' => $universities,
//         'colleges' => $colleges,
//         'majors' =>     $majors,
//     ]);
// }


// public function edit(Request $request): View
// {
//     $user = $request->user();
//     $student = $user->student;
//     $universities = University::select('id', 'name')->get();
//     $colleges = College::select('id', 'name')->get();

//     $university_id = $student->university_id;

//     // جلب التخصصات المرتبطة بالكليات التابعة للجامعة المختارة
//     $majors = Major::whereHas('college', function ($query) use ($university_id) {
//         $query->where('university_id', $university_id);
//     })->get();


//     // dd($majors);
//     return view('profile.edit', [
//         'user' => $user,
//         'student' => $student,
//         'universities' => $universities,
//         'colleges' => $colleges,
//         'majors' => $majors,
//     ]);
// }



public function edit(Request $request): View
{
    return view('profile.edit', [
        'user' => $request->user(),
    ]);
}

public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $request->user()->fill($request->validated());

    if ($request->user()->isDirty('email')) {
        $request->user()->email_verified_at = null;
    }

    $request->user()->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}






public function updatePhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();

    // حذف الصورة القديمة لو موجودة
    if ($user->profile_photo_path && File::exists(public_path('images/profile_photos/' . $user->profile_photo_path))) {
        File::delete(public_path('images/profile_photos/' . $user->profile_photo_path));
    }

    // حفظ الصورة الجديدة
    $image = $request->file('profile_photo');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images/profile_photos'), $imageName);

    // تحديث مسار الصورة في جدول المستخدم
    $user->profile_photo_path = $imageName;
    $user->save();

    return redirect()->back()->with('success', 'تم تحديث صورة البروفايل.');
}


    /**
     * Update the user's profile information.
        */



// public function update(Request $request)
// {
//     $user = $request->user();

//     $validated = $request->validate([
//         'name' => ['required', 'string', 'max:255'],
//         'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
//     ]);

//     if ($validated['email'] !== $user->email && $user instanceof MustVerifyEmail) {
//         $user->email = $validated['email'];
//         $user->email_verified_at = null;
//         $user->save();

//         $user->sendEmailVerificationNotification();
//     } else {
//         $user->update($validated);
//     }

//     return back()->with('status', 'profile-updated');
// }




// public function updateExtra(Request $request)
// {
//     $request->validate([
//         'student_id' => ['nullable', 'string', 'max:255'],
//         // أضف المزيد من الفحوصات حسب الحاجة
//     ]);

//     $student = auth()->user()->student;
//     $student->update([
//         'student_id' => $request->student_id,

//         // أي خصائص إضافية
//     ]);

//     return back()->with('status', 'extra-updated');
// }


public function updateExtra(Request $request)
{
    $request->validate([
        'student_id'     => ['nullable', 'string', 'max:255'],
        'phone'          => ['nullable', 'string'],
        'university_id'  => ['nullable', 'exists:universities,id'],
        'college_id'     => ['nullable', 'exists:colleges,id'],
        'major_id'       => ['nullable', 'exists:majors,id'],
    ]);

    $student = auth()->user()->student;

    $student->update([
        'student_id'     => $request->student_id,
        'phone'          => $request->phone,
        'university_id'  => $request->university_id,
        'college_id'     => $request->college_id,
        'major_id'       => $request->major_id,
    ]);

    return back()->with('status', 'extra-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
