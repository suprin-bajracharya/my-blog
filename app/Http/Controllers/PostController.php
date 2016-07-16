<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);//creating a variable and paginating diaplay

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
                'title' => 'required|max:255|min:2',
                'slug'  => 'required|max:255|min:2|alpha_dash|unique:posts,slug',
                'body'  => 'required' 
            ));

        //store in the database
        $post = new Post; //object of the post model

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->body  = $request->body; 

        $post->save();

        Session::flash('success', 'The post has been posted successfully.');
        //redirect to another page
        return redirect()->route('posts.show', $post->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database as save as a var
        $post = Post::find($id);
        //return the view and pass in the var created previously or above.
        return view('posts.edit')->withPost($post);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the data
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
            $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|max:255|min:2|alpha_dash',
            'body' => 'required'
            ));
        }else{
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|max:255|min:2|alpha_dash|unique:posts,slug',
            'body' => 'required'
            ));
        }   
        //Save the date to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->body  = $request->input('body');

        $post->save();
        //set flash data with success message
        Session::flash('success', 'The post has been updated successfully');
        //redirect with the flash data or posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the data from the database
        $post = Post::find($id);

        $post->delete();
        //show flash message.
        Session::flash('success', 'The post has been deleted successfully');
        //redirect to index
        return redirect()->route('posts.index');

    }
}
