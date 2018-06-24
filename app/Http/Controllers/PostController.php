<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostsCreateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::all();
        
        //paginate
        $posts = Post::paginate(2);
        return view('admin.post.index',compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all()->pluck('name','id');
        
        
        
        return view('admin.post.create',  compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        
        $input = $request->all();
        
        $user = Auth::user();
        
        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            
            $file->move('images', $name);
            
            $photo = Photo::create(['file' => $name]);
            
            $input['photo_id'] = $photo->id;
            
        }
        
        $user->post()->create($input);
        
        Session::flash('create_post','The Post has been Created!!!');
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all()->pluck('name','id');
        
        return view('admin.post.edit', compact('post','category'));
        
        
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
        $post = Post::find($id);
        $input = $request->all();
        
        if($file = $request->file('photo_id')){
            
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            
            $photo = Photo::create(['file'=>$name]);
            
            $input['photo_id'] = $photo->id;
            
        }
        
        $post->update($input);
        
         return redirect('/Admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        unlink(public_path() . $post->photo->file);
        
        $post->delete();
        
        Session::flash('delete_post','The user has been deleted!!!');
        
        return redirect('/posts');
    }
    public function post($id){
        
        $post = Post::findOrFail($id);
        
        $comments = $post->comments()->whereIsActive(1)->get();
        
        return view('post', compact('post', 'comments'));
        
    }
}
