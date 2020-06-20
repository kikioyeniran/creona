<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutorial;
use App\Http\Controllers\actions\UtilitiesController;


class TutorialsController extends Controller
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
        $new = new Tutorial();
        $tutorials = $new->getTutorials();
        return view('tutorials.index')->with('tutorials', $tutorials);
    }
    public function all()
    {
        $new = new Tutorial();
        $tutorials = $new->getTutorials();
        return view('tutorials.all')->with('tutorials', $tutorials);
    }

    public function displayByLink($link)
    {
        $new = new Tutorial();
        $tutorials = $new->getTutorialsByLink($link);
        return view('tutorials.show')->with('tutorials', $tutorials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutorials.create');
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
            'description' => 'required',
            'picture' => 'image|nullable|max:2999',
            'video' => 'nullable|file|max:59999',
            'tutor' => 'required',
            'preview_link' => 'required'
        ]);
        //Handle image up0loads
        $image = $request->file('picture');
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        // Handle video upload
        $video = $request->file('video');
        if ($request->hasFile('video')) {
            $call = new UtilitiesController();
            $videoNameToStore = $call->videoNameToStore($video);
        } else {
            $videoNameToStore = 'novideo.pdf';
        }

        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $tutorial = new Tutorial;
        $tutorial->title = $title;
        $tutorial->description = $request->input('description');
        $tutorial->tutor = $request->input('tutor');
        $tutorial->link = $link;
        $tutorial->preview_link = $request->input('preview_link');
        $tutorial->picture = $fileNameToStore;
        $tutorial->video = $videoNameToStore;
        $tutorial->save();
        return redirect('/tutorials/all')->with('success', 'Post created');
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
        $tutorial = Tutorial::find($id);
        return view('tutorials.edit')->with('post', $tutorial);
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
            'description' => 'required',
            'picture' => 'image|nullable|max:2999',
            'video' => 'nullable|file|max:59999',
            'tutor' => 'required',
            'preview_link' => 'required'
        ]);
        //Handle image up0loads
        $image = $request->file('picture');
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        // Handle video upload
        $video = $request->file('video');
        if ($request->hasFile('video')) {
            $call = new UtilitiesController();
            $videoNameToStore = $call->videoNameToStore($video);
        } else {
            $videoNameToStore = 'novideo.pdf';
        }

        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $tutorial = Tutorial::find($id);
        $tutorial->title = $title;
        $tutorial->description = $request->input('description');
        $tutorial->tutor = $request->input('tutor');
        $tutorial->link = $link;
        $tutorial->preview_link = $request->input('preview_link');
        if ($request->hasFile('picture')) {
            $tutorial->picture = $fileNameToStore;
        }
        if ($request->hasFile('video')) {
            $tutorial->video = $videoNameToStore;
        }
        $tutorial->save();
        return redirect('/tutorials/all')->with('success', 'Post created');
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
    // disable tutorial
    public function disable($id)
    {
        $tutorial = Tutorial::find($id);
        $tutorial->disabled = 'true';
        $tutorial->save();
        return redirect('tutorials/all')->with('success', 'Post disabled');
    }

    // Restore disabled tutorial
    public function restore($id)
    {
        $tutorial = Tutorial::find($id);
        $tutorial->disabled = 'false';
        $tutorial->save();
        return redirect('/tutorials/disabled')->with('success', 'Post Restored');
    }

    // Display disabled tutorial
    public function disabled()
    {
        $new = new Tutorial();
        $d_tutorials = $new->getDisabledTutorials();
        return view('tutorials.disabled')->with('tutorials', $d_tutorials);
    }
}
