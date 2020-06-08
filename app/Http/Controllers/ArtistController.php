<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Controllers\actions\UtilitiesController;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist.create');
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
            'name' => 'required',
            'bio' => 'required',
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
        $artist = new Artist;
        $artist->name = $request->input('name');
        $artist->bio = $request->input('bio');
        $artist->picture = $fileNameToStore;
        $artist->save();

        $id = $artist->id;
        $link = "/artist" . "/" . $id . "/edit";
        return redirect($link)->with('success', 'Post created');
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
        $artist = Artist::find($id);
        return view('artist.edit')->with('post', $artist);
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
            'name' => 'required',
            'bio' => 'required',
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
        $artist = Artist::find($id);
        $artist->name = $request->input('name');
        $artist->bio = $request->input('bio');
        if ($request->hasFile('picture')) {
            $artist->picture = $fileNameToStore;
        }
        $artist->save();

        $id = $artist->id;
        $link = "/artist" . "/" . $id . "/edit";
        return redirect($link)->with('success', 'Post created');
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
}
