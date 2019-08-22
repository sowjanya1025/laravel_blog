<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return " amm hrere";
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::pluck('name')->all();
        return view('admin.posts.create',compact('category'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        $request->validate(['title'=>'required',
                            'content'=>'required',
                            'category_id'=>'required']);

        $postsdata =  $request->all();

        if($request->hasFile('photo_id'))
        {
          // return "i am hrere";
           
            $file = $request->file('photo_id');
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

           // return $photo;
          //  exit;

            $postsdata['photo_id'] = $photo->id;
            
        }

       // $id = Auth::id();
        $postsdata['user_id'] = 1;



        $storedata = Post::create($postsdata);
        return redirect('/admin/posts'); 
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function posts()
    {
        $posts = Post::all();
        return view('welcome',compact('posts'));
    }

    Public function postsById($id)
    {
       //return "i am hrere";
        $post = Post::findOrFail($id);
       // dd($posts);
       $comments = Post::find($id)->comments()->where('is_active',1)->orderBy('id', 'desc')->get();
       //return $comments;
        return view('posts',compact('post','comments'));
    }


    
}
