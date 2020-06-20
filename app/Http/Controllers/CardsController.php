<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Http\Controllers\actions\UtilitiesController;
use Illuminate\Auth\Access\Gate;


class CardsController extends Controller
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
        $new = new Card();
        $cards = $new->getCards();
        return view('cards.index')->with('cards', $cards);
    }
    public function all()
    {
        $new = new Card();
        $cards = $new->getCards();
        return view('cards.all')->with('cards', $cards);
    }

    public function displayByLink($link)
    {
        $new = new Card();
        $cards = $new->getArtServicesByLink($link);
        return view('cards.show')->with('cards', $cards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
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
            'picture' => 'image|nullable|max:2999',
            'size' => 'required',
            'price' => 'required'
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
        $card = new Card;
        $card->name = $request->input('name');
        $card->description = $request->input('description');
        $card->size = $request->input('size');
        $card->price = $request->input('price');
        $card->link = $link;
        $card->picture = $fileNameToStore;
        $card->save();
        return redirect('/cards/all')->with('success', 'Post created');
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
        $card = Card::find($id);
        return view('cards.edit')->with('post', $card);
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
            'picture' => 'image|nullable|max:2999',
            'size' => 'required',
            'price' => 'required'
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
        $card = Card::find($id);
        $card->name = $request->input('name');
        $card->description = $request->input('description');
        $card->size = $request->input('size');
        $card->price = $request->input('price');
        $card->link = $link;
        if ($request->hasFile('picture')) {
            $card->picture = $fileNameToStore;
        }
        $card->save();
        return redirect('/cards/all')->with('success', 'Post created');
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
    // disable card
    public function disable($id)
    {
        $card = Card::find($id);
        $card->disabled = 'true';
        $card->save();
        return redirect('cards/all')->with('success', 'Post disabled');
    }

    // Restore disabled card
    public function restore($id)
    {
        $card = Card::find($id);
        $card->disabled = 'false';
        $card->save();
        return redirect('/cards/disabled')->with('success', 'Post Restored');
    }

    // Display disabled card
    public function disabled()
    {
        $new = new Card();
        $d_card = $new->getDisabledCards();
        return view('cards.disabled')->with('card', $d_card);
    }
}
