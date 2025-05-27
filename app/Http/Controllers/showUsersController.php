<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class showUsersController extends Controller
{
    // عرض قائمة المستخدمين
    // public function index()
    // {


    //      // تحديث آخر نشاط للمستخدم الحالي (لو مسجل دخول)
    // if (Auth::check()) {
    //     $user = Auth::user();
    //     // $user->last_active_at = now();
    //     $user->save();
    // }


    //     // جلب جميع المستخدمين مع صورة البروفايل ووقت آخر نشاط
    //     $users = User::select('id', 'name')->get();

    //     return view('users.index', compact('users'));
    // }


//     public function index(Request $request)
// {
//     $users = User::query()
//         ->when($request->name, fn($q, $name) => $q->where('name', 'like', "%$name%"))
//         ->when($request->major, fn($q, $major) => $q->whereHas('student', fn($q) => $q->where('major_id', $major)))
//         ->when($request->activity === 'today', fn($q) => $q->whereDate('last_active_at', today()))
//         ->with(['student.major', 'student.university', 'student.college'])
//         ->paginate(12);

//     if ($request->wantsJson()) {
//         return response()->json([
//             'html' => view('users.partials.users_list', compact('users'))->render(),
//             'count' => $users->count()
//         ]);
//     }

//     $majors = Major::all();
//     return view('users.index', compact('users', 'majors'));
// }

public function index(Request $request)
{
    $users = User::query()
        ->when($request->name, function($query, $name) {
            return $query->where('name', 'like', "%$name%");
        })
        ->when($request->email, function($query, $email) {
            return $query->where('email', 'like', "%$email%");
        })
        ->when($request->phone, function($query, $phone) {
            return $query->where('phone', 'like', "%$phone%");
        })
        ->when($request->bio, function($query, $bio) {
            return $query->where('bio', 'like', "%$bio%");
        })
        ->when($request->role, function($query, $role) {
            return $query->where('role', $role);
        })
        ->when($request->major, function($query, $major) {
            return $query->whereHas('student', function($q) use ($major) {
                $q->where('major_id', $major);
            });
        })
        ->with(['student.courses']) // Include the courses the student is enrolled in
        ->orderBy('created_at', 'desc')
        ->paginate(15);

    if ($request->wantsJson()) {
        return response()->json([
            'html' => view('users.partials.users_list', compact('users'))->render(),
            'count' => $users->total()
        ]);
    }

    $majors = Major::all();
    return view('users.index', compact('users', 'majors'));
}



    // عرض صفحة البروفايل لمستخدم معين
    public function show(User $user)
    {

        $courses = $user->student->courses ?? [];
        return view('users.show', compact('user', 'courses'));
    }



    public function search(Request $request)
{
    $query = User::query()->with(['student.major', 'student.university', 'student.college']);

    if ($request->filled('name')) {
        $name = $request->input('name');
        $query->where('name', 'like', "%{$name}%");
    }

    if ($request->filled('major')) {
        $majorId = $request->input('major');
        $query->whereHas('student.major', function ($q) use ($majorId) {
            $q->where('id', $majorId);
        });
    }

    if ($request->filled('activity')) {
        switch ($request->input('activity')) {
            case 'today':
                $query->whereDate('last_active_at', now()->toDateString());
                break;
            case 'week':
                $query->whereBetween('last_active_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('last_active_at', now()->month);
                break;
            case 'inactive':
                $query->whereNull('last_active_at');
                break;
        }
    }

    $users = $query->get()->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'last_active_at' => $user->last_active_at ? $user->last_active_at->diffForHumans() : null,
            'major_name' => $user->student->major->name ?? null,
            'university_name' => $user->student->university->name ?? null,
            'college_name' => $user->student->college->name ?? null,
            'created_at' => $user->created_at->diffForHumans(),
        ];
    });

    return response()->json(['users' => $users]);
}

}
