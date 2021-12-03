<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout() {
        $data =[];
        $data['name'] = 'Yassir Abdelkarim';
        $data['email'] = 'jaferaa1@gmail.com';

        return view('pages.about')->with('data', $data);
    }

    public function getContact() {

        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'subject' => 'required|min:4',
            'message' => 'required|min:10'
        ]);
        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        ];
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('hello@yassir.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was sent!');

        return redirect()->url('/');
    }
}