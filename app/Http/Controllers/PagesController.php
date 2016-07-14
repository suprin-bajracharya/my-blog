<?php
namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller{
	public function getIndex(){
		//already connected to database table using Model Post
		$posts = Post::orderBy('created_at', 'asc')->limit(4)->get();
		return view('pages/welcome')->withPosts($posts);
	}

	public function getAbout(){
		return view('pages/about');
	}
	public function getContact(){
		return view('pages/contact');
	}
	// public function postContact(){
		
	// }
}	