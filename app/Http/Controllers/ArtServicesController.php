<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtService;
use App\Http\Controllers\actions\UtilitiesController;

class ArtServicesController extends Controller
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
        $new = new ArtService();
        $art_services = $new->getart_services();
        return view('art_services.index')->with('art_services', $art_services);
    }
    public function all()
    {
        $new = new ArtService();
        $art_services = $new->getArtServices();
        return view('art_services.all')->with('art_services', $art_services);
    }

    public function displayByLink($link)
    {
        $new = new ArtService();
        $art_services = $new->getArtServicesByLink($link);
        return view('art_services.show')->with('art_services', $art_services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('art_services.create');
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
            'description' => 'required',
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
        $title = $request->input('name');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $art_service = new ArtService;
        $art_service->title = $title;
        $art_service->name = $request->input('name');
        $art_service->description = $request->input('description');
        $art_service->picture = $fileNameToStore;
        $art_service->save();
        return redirect('/art_services/all')->with('success', 'Post created');
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
        $art_service = ArtService::find($id);
        return view('art_services.edit')->with('post', $art_service);
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
            'description' => 'required',
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
        $title = $request->input('name');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $art_service = ArtService::find($id);
        $art_service->title = $title;
        $art_service->name = $request->input('name');
        $art_service->description = $request->input('description');
        if ($request->hasFile('picture')) {
            $art_service->picture = $fileNameToStore;
        }
        $art_service->save();
        return redirect('/art_services/all')->with('success', 'Post created');
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
    // disable art_service
    public function disable($id)
    {
        $art_service = ArtService::find($id);
        $art_service->disabled = 'true';
        $art_service->save();
        return redirect('/art_service/all')->with('success', 'Post disabled');
    }

    // Restore disabled art_service
    public function restore($id)
    {
        $art_service = ArtService::find($id);
        $art_service->disabled = 'false';
        $art_service->save();
        return redirect('/art_service/disabled')->with('success', 'Post Restored');
    }

    // Display disabled art_service
    public function disabled()
    {
        $new = new ArtService();
        $d_art_service = $new->getDisabledArtServices();
        return view('art_service.disabled')->with('art_service', $d_art_service);
    }
}
