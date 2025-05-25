<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();
        return view('pages.contact', compact('page'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // ممكن ترسلها لإيميلك أو تخزنها بجدول messages مثلاً
        // مثال: إرسال إيميل
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('r409456712@gmail.com')  // غيّر هذا الإيميل لإيميلك
                    ->subject('New Contact Message from ' . $request->name)
                    ->replyTo($request->email);
        });

        return back()->with('success', 'Your message has been sent!');
    }


    public function terms()
{
    return view('pages.term');
}


public function privacy()
{
    return view('pages.show');
}





}
