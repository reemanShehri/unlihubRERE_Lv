<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseChat;
use Illuminate\Http\Request;
use App\Models\CourseMessage;

class CourseChatController extends Controller
{
    //


    // app/Http/Controllers/CourseChatController.php

public function show(Course $course)
{
    $chat = CourseChat::firstOrCreate(['course_id' => $course->id]);
    $messages = $chat->messages()->with('user')->latest()->get();
    return view('course_chat.show', compact('course', 'chat', 'messages'));
}

// public function send(Request $request, Course $course)
// {
//     $chat = CourseChat::firstOrCreate(['course_id' => $course->id]);

//     CourseMessage::create([
//         'course_chat_id' => $chat->id,
//         'user_id' => auth()->id(),
//         'message' => $request->message,
//     ]);

//     return back();
// }



   public function send(Request $request, Course $course)
    {
        $chat = CourseChat::firstOrCreate(['course_id' => $course->id]);

        $request->validate([
            'message' => 'required|string|max:2000',
            'reply_to_message_id' => 'nullable|exists:course_messages,id',
            'edit_message_id' => 'nullable|exists:course_messages,id',
        ]);

        if ($request->filled('edit_message_id')) {
            $msg = CourseMessage::findOrFail($request->edit_message_id);

            if ($msg->user_id !== auth()->id()) {
                abort(403, 'Unauthorized action.');
            }

            $msg->message = $request->message;
            $msg->save();

            return back()->with('success', 'Message updated successfully.');
        }


            // إرسال رسالة جديدة (مع خيار الرد على رسالة موجودة)
        CourseMessage::create([
            'course_chat_id' => $chat->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
            'reply_to_message_id' => $request->reply_to_message_id,  // هذا الحقل لازم يكون موجود في الموديل والجدول
        ]);

        return back()->with('success', 'Message sent successfully.');
    }



     public function destroy(Course $course, CourseMessage $message)
    {
        // التحقق من الصلاحية (كاتب الرسالة فقط)
        if ($message->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $message->delete();

        return back()->with('success', 'Message deleted successfully.');
    }
}
