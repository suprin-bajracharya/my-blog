<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;

use Session;
use Purifier;


class PostController extends Controller
{
    public function __construct(){
        //only authenticated user can access this page
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(10);//creating a variable and paginating diaplay

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate the data
        $this->validate($request, array(
                'title'         => 'required|max:255|min:2',
                'slug'          => 'required|max:255|min:2|alpha_dash|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ));

        //store in the database
        $post = new Post; //object of the post model

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = Purifier::clean($request->body);

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('Success', 'The post has been posted successfully.');
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
        return view('posts.show')->withPost($post);
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
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 =[];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        //return the view and pass in the var created previously or above.
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);        
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
            'category_id'=> 'required|integer',
            'body' => 'required'
            ));
        }else{
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|max:255|min:2|alpha_dash|unique:posts,slug',
            'category_id'=> 'required|integer',
            'body' => 'required'
            ));
        }   
        //Save the date to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body  = Purifier::clean($request->input('body'));

        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);    
        }else{
            $post->tags()->sync([]);
        }
        
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
        $post->tags()->detach();

        $post->delete();
        //show flash message.
        Session::flash('success', 'The post has been deleted successfully');
        //redirect to index
        return redirect()->route('posts.index');

    }
}
