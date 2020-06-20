<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\actions\UtilitiesController;
use App\CompanyDetails;

class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'can:verify-admin'], ['except' => ['index', 'show']]);
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
        return view('company_details.create');
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
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fb_link' => 'required',
            'ig_link' => 'required',
            'tw_link' => 'required',
            'yt_link' => 'required',
            'picture' => 'image|nullable|max:2999',
            'mission' => 'required'
        ]);
        $image = $request->file('picture');
        //Handle file up0loads
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $comp = new CompanyDetails;
        $comp->address = $request->input('address');
        $comp->email = $request->input('email');
        $comp->phone_number = $request->input('phone');
        $comp->fb_link = $request->input('fb_link');
        $comp->ig_link = $request->input('ig_link');
        $comp->tw_link = $request->input('tw_link');
        $comp->yt_link = $request->input('yt_link');
        $comp->mission = $request->input('mission');
        if ($request->hasFile('picture')) {
            $comp->picture = $fileNameToStore;
        }
        $comp->save();

        $cid = $comp->id;
        $link = "/company-details" . "/" . $cid . "/edit";
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
        $comp = CompanyDetails::find($id);
        return view('company_details.edit')->with('post', $comp);
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
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fb_link' => 'required',
            'ig_link' => 'required',
            'tw_link' => 'required',
            'yt_link' => 'required',
            'picture' => 'image|nullable|max:2999',
            'mission' => 'required'
        ]);
        $image = $request->file('picture');
        //Handle file up0loads
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $comp = CompanyDetails::find($id);
        $comp->address = $request->input('address');
        $comp->email = $request->input('email');
        $comp->phone_number = $request->input('phone');
        $comp->fb_link = $request->input('fb_link');
        $comp->ig_link = $request->input('ig_link');
        $comp->tw_link = $request->input('tw_link');
        $comp->yt_link = $request->input('yt_link');
        $comp->mission = $request->input('mission');
        if ($request->hasFile('picture')) {
            $comp->picture = $fileNameToStore;
        }
        $comp->save();
        $cid = $comp->id;
        $link = "/company-details" . "/" . $cid . "/edit";
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
