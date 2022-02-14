<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(15);
        return view('dashboard.message.index',['messages'=>$messages]);
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('dashboard.message.message-detaile',['message'=>$message]);
    }

    public function destroy($id)
    {
        Message::destroy($id);
        return redirect()->route('admin.messages')->with('success','تم حذف الرسالة بنجاح');
    }
}