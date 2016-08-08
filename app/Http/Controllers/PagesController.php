<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{
	public function getIndex(){
		//already connected to database table using Model Post
		$posts = Post::orderBy('created_at', 'desc')->limit(10)->get();
		return view('pages/welcome')->withPosts($posts);
	}

	public function getAbout(){
		return view('pages/about');
	}
	public function getContact(){
		return view('pages/contact');
	}
	public function postContact(Request $request){
		$this->validate($request, [
			'email' 	=> 'required|email',
			'subject' 	=> 'required|min:3',
			'message'	=> 'min:10'
			]);
		$data = [
			'email' 		=> $request->email,
			'subject' 		=> $request->subject,
			'bodyMessage' 	=> $request->message
		];

		Mail::send('emails.contact', $data, function($message) use($data){
			$message->from($data['email']);
			$message->to('bajrasuprin@gmail.com');
			$message->cc($data['email']);
			$message->subject($data['subject']);
		});

		Session::flash('success', 'We will get in touch with u soon');	
		
		return redirect('contact');
	}
}	