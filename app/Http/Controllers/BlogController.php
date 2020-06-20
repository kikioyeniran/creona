<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\actions\UtilitiesController;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'can:verify-admin'], ['except' => ['index', 'show', 'displayByLink']]);
    }
    public function index()
    {
        $new = new Blog();
        $blog = $new->getBlogs();
        return view('blog.index')->with('blogs', $blog);
    }
    public function all()
    {
        $new = new Blog();
        $blog = $new->getBlogs();
        return view('blog.all')->with('blog', $blog);
    }

    public function displayByLink($link)
    {
        $new = new blog();
        $blog = $new->getBlogsByLink($link);
        $new2 = new Blog();
        $all_blogs = $new2->getBlogs();
        return view('blog.show')->with(['blog' => $blog, 'all_blogs' => $all_blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'picture' => 'image|nullable|max:2999'
        ]);
        //Handle file up0loads
        $image = $request->file('picture');
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $blog = new Blog;
        $blog->title = $title;
        $blog->author = $request->input('author');
        $blog->summary = $request->input('summary');
        $blog->details = $request->input('details');
        $blog->picture = $fileNameToStore;
        $blog->link = $link;
        $blog->save();
        return redirect('/blog/all')->with('success', 'Post created');
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
        $blog = Blog::find($id);
        return view('blog.edit')->with('post', $blog);
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
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'picture' => 'image|nullable|max:2999'
        ]);
        $image = $request->file('picture');
        //Handle file up0loads
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $blog = Blog::find($id);
        $blog->title = $title;
        $blog->author = $request->input('author');
        $blog->summary = $request->input('summary');
        $blog->details = $request->input('details');
        $blog->link = $link;
        if ($request->hasFile('picture')) {
            $blog->picture = $fileNameToStore;
        }
        $blog->save();
        return redirect('/blog/all')->with('success', 'Post created');
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
    // Archive blog
    public function archive($id)
    {
        $blog = Blog::find($id);
        $blog->archived = 'true';
        $blog->save();
        return redirect('/blog/all')->with('success', 'Post archived');
    }

    // Restore archived blog
    public function restore($id)
    {
        $blog = Blog::find($id);
        $blog->archived = 'false';
        $blog->save();
        return redirect('/blog/archived')->with('success', 'Post Restored');
    }

    // Display archived blog
    public function archived()
    {
        $new = new blog();
        $d_blog = $new->getArchivedBlogs();
        return view('blog.archived')->with('blog', $d_blog);
    }
}
