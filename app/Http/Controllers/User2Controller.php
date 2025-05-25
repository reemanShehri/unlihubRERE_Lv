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



    public function getFormattedPhoneForWhatsApp()
{
    // رقم الهاتف الخام من الحقل
    $phone = $this->phone ?? ''; // افترض أن الحقل اسمه phone

    // إذا الرقم فارغ ارجع فارغ
    if (empty($phone)) {
        return null;
    }

    // إزالة المسافات والرموز غير الرقمية (اختياري)
    $phone = preg_replace('/\D+/', '', $phone);

    // إزالة أول صفر إذا موجود
    if (str_starts_with($phone, '0')) {
        $phone = substr($phone, 1);
    }

    // إضافة كود الدولة إذا لم يكن موجود
    if (!str_starts_with($phone, '972') && !str_starts_with($phone, '970')) {
        // افتراضياً نضيف 972 (يمكن تعدل حسب بلد المستخدم)
        $phone = '972' . $phone;
    }

    return $phone;
}

}
