<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('admin.posts.index',compact('posts'));
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
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $model = new Post();
        $model->title = $request->title;
        $model->slug = $request->slug;
        if ($request->hasFile('featured')) {
           $file = $request->file('featured');
           $fileName = time().$file->getClientOriginalName();
           $file->storeAs('upload/posts/', $fileName);
           $model->featured = 'upload/posts/'.$fileName;
        }
        $model->content = $request->content;
        $model->category_id = $request->category_id;
        // var_dump($model);
        $model->save();
        $model->tags()->sync($request->tags, false); //False là không ghi đè
        session()->flash('status','Create successfully!');
        return redirect()->route('post.index');
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
        $model = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.update',compact('model','categories','tags'));
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
        $model = Post::find($id);
        $model->title = $request->title;
        $model->slug = $request->slug;
        if ($request->hasFile('featured')) {
           $file = $request->file('featured');
           $fileName = time().$file->getClientOriginalName();
           $file->storeAs('upload/posts/', $fileName);
           $model->featured = 'upload/posts/'.$fileName;
        }
        $model->content = $request->content;
        $model->category_id = $request->category_id;
        // var_dump($model);
        $model->save();
        $model->tags()->sync($request->tags); 
        session()->flash('status','Update successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::find($id);
        $model->tags()->detach();
        if (! $model) {
            echo "<h1>Danh mục không tồn tại</h1>";die;
        }
        $model->delete();
        if (file_exists($model->featured)) {    
            unlink(public_path($model->featured));
        }
        // session()->flash('notif','Remove done!');   
        return redirect()->route('post.index');
    }
}
