<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebook;
use App\Http\Controllers\actions\UtilitiesController;


class EbooksController extends Controller
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
        $new = new Ebook();
        $ebooks = $new->getEbooks();
        return view('ebooks.index')->with('ebooks', $ebooks);
    }
    public function all()
    {
        $new = new Ebook();
        $ebooks = $new->getEbooks();
        return view('ebooks.all')->with('ebooks', $ebooks);
    }

    public function displayByLink($link)
    {
        $new = new Ebook();
        $ebooks = $new->getEbooksByLink($link);
        return view('ebooks.show')->with('ebooks', $ebooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ebooks.create');
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
            'document' => 'nullable|file|max:4999',
            'price' => 'required',
            'author' => 'required',
        ]);
        //Handle image up0loads
        $image = $request->file('picture');
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        // Handle document upload
        $document = $request->file('document');
        if ($request->hasFile('document')) {
            $call = new UtilitiesController();
            $documentNameToStore = $call->documentNameToStore($document);
        } else {
            $documentNameToStore = 'nodocument.pdf';
        }

        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $ebook = new Ebook;
        $ebook->title = $title;
        $ebook->description = $request->input('description');
        $ebook->price = $request->input('price');
        $ebook->author = $request->input('author');
        $ebook->link = $link;
        $ebook->picture = $fileNameToStore;
        $ebook->document = $documentNameToStore;
        $ebook->save();
        return redirect('/ebooks/all')->with('success', 'Post created');
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
        $ebook = Ebook::find($id);
        return view('ebooks.edit')->with('post', $ebook);
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
            'document' => 'nullable|file|max:4999',
            'price' => 'required',
            'author' => 'required',
        ]);
        //Handle image up0loads
        $image = $request->file('picture');
        if ($request->hasFile('picture')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        // Handle document upload
        $document = $request->file('document');
        if ($request->hasFile('document')) {
            $call = new UtilitiesController();
            $documentNameToStore = $call->documentNameToStore($document);
        } else {
            $documentNameToStore = 'nodocument.pdf';
        }

        $title = $request->input('title');
        $arr = explode(" ", $title);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($title);
        }
        $ebook = Ebook::find($id);
        $ebook->title = $title;
        $ebook->description = $request->input('description');
        $ebook->price = $request->input('price');
        $ebook->author = $request->input('author');
        $ebook->link = $link;
        if ($request->hasFile('picture')) {
            $ebook->picture = $fileNameToStore;
        }
        if ($request->hasFile('document')) {
            $ebook->document = $documentNameToStore;
        }
        $ebook->save();
        return redirect('/ebooks/all')->with('success', 'Post created');
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
    // disable ebook
    public function disable($id)
    {
        $ebook = Ebook::find($id);
        $ebook->disabled = 'true';
        $ebook->save();
        return redirect('ebooks/all')->with('success', 'Post disabled');
    }

    // Restore disabled ebook
    public function restore($id)
    {
        $ebook = Ebook::find($id);
        $ebook->disabled = 'false';
        $ebook->save();
        return redirect('/ebooks/disabled')->with('success', 'Post Restored');
    }

    // Display disabled ebook
    public function disabled()
    {
        $new = new Ebook();
        $d_ebooks = $new->getDisabledEbooks();
        return view('ebooks.disabled')->with('ebooks', $d_ebooks);
    }
}
