<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Save to database
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Send email using Laravel Mail
        Mail::html("
                <h3>Nouveau contact Message</h3>
                <p><b>Name:</b> {$request->name}</p>
                <p><b>Email:</b> {$request->email}</p>
                <p><b>Message:</b><br>{$request->message}</p>
                ", function ($mail) use ($request) {
            $mail->to('derrickteddywongbay@gmail.com')
                ->replyTo($request->email, $request->name)
                ->subject('Nouveau message de Derrix.');
        });

        return redirect('/')->with('success', 'Message envoyé avec succès !');
    }

    public function markAsRead(int $id)
    {
        $message = Message::findOrFail($id);
        $message->status = 'read';
        $message->save();

        return back();
    }

    public function destroy(int $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return back();
    }
}
