<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedWork;
use App\Http\Controllers\actions\UtilitiesController;
use Illuminate\Support\Facades\Auth;

class FeaturedWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'can:manage-users'], ['except' => ['index', 'show', 'displayByLink']]);
    }

    public function index()
    {
        $new = new FeaturedWork();
        $featured_works = $new->getAllFeaturedWorks();
        return view('featured-works.index')->with('featured_works', $featured_works);
    }
    public function all()
    {
        $user = Auth::user();
        $id = $user->id;
        $new = new FeaturedWork();
        $featured_works = $new->getArtistFeaturedWorks($id);
        return view('featured-works.artist.all')->with('featured_works', $featured_works);
    }
    public function admin_all()
    {
        if (Auth::user()->hasRole('admin')) {
            $new = new FeaturedWork();
            $featured_works = $new->getFeaturedWorks();
            return view('featured-works.admin.all')->with('featured_works', $featured_works);
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }
    public function admin_pending()
    {
        if (Auth::user()->hasRole('admin')) {
            $new = new FeaturedWork();
            $featured_works = $new->getPendingFeaturedWorks();
            return view('featured-works.admin.pending')->with('featured_works', $featured_works);
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }

    public function displayByLink($link)
    {
        $new = new FeaturedWork();
        $featured_works = $new->getFeaturedWorkByLink($link);
        return view('featured-works.show')->with('featured_works', $featured_works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('featured-works.artist.create');
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
            'price' => 'required',
        ]);
        //Handle image up0loads
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
        $user = Auth::user();
        $id = $user->id;
        $featured_work = new FeaturedWork;
        $featured_work->title = $title;
        $featured_work->description = $request->input('description');
        $featured_work->price = $request->input('price');
        $featured_work->link = $link;
        $featured_work->user_id = $id;
        $featured_work->picture = $fileNameToStore;
        $featured_work->save();
        return redirect('/featured-works/artist/all')->with('success', 'Post created');
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
        $user = Auth::user();
        $user_id = $user->id;
        $featured_work = FeaturedWork::find($id);
        if ($featured_work->user_id != $user_id) {
            return redirect('/featured-works/artist/all')->with('error', 'Unauthorised Page');
        }
        return view('featured-works.artist.edit')->with('post', $featured_work);
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
            'price' => 'required',
        ]);
        //Handle image up0loads
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
        $user = Auth::user();
        $id = $user->id;
        $featured_work = FeaturedWork::find($id);
        $featured_work->title = $title;
        $featured_work->description = $request->input('description');
        $featured_work->price = $request->input('price');
        $featured_work->link = $link;
        $featured_work->user_id = $id;
        if ($request->hasFile('picture')) {
            $featured_work->picture = $fileNameToStore;
        }
        $featured_work->save();
        return redirect('/featured-works/artist/all')->with('success', 'Post created');
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

    // VIEW FUNCTIONS

    // Disabled Featured Works for each artist
    public function ArtistDisabled()
    {
        $user = Auth::user();
        $id = $user->id;
        $new = new FeaturedWork();
        $d_featured_works = $new->getArtistDisabledFeaturedWorks($id);
        return view('featured-works.artist.disabled')->with('featured_works', $d_featured_works);
    }

    // disapproved featured works for artists
    public function ArtistDisapproved()
    {
        $user = Auth::user();
        $id = $user->id;
        $new = new FeaturedWork();
        $d_featured_works = $new->getArtistDisapprovedFeaturedWorks($id);
        return view('featured-works.artist.disapproved')->with('featured_works', $d_featured_works);
    }

    // approved featured works for artists
    public function ArtistApproved()
    {
        $user = Auth::user();
        $id = $user->id;
        $new = new FeaturedWork();
        $featured_works = $new->getArtistApprovedFeaturedWorks($id);
        return view('featured-works.artist.approved')->with('featured_works', $featured_works);
    }

    // Disabled Featured Works for each admin
    public function AdminDisabled()
    {
        if (Auth::user()->hasRole('admin')) {
            $new = new FeaturedWork();
            $d_featured_works = $new->getAllDisabledFeaturedWorks();
            return view('featured-works.admin.disabled')->with('featured_works', $d_featured_works);
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }

    // disapproved featured works for admin
    public function AdminDisapproved()
    {
        if (Auth::user()->hasRole('admin')) {
            $new = new FeaturedWork();
            $d_featured_works = $new->getAllDisapprovedFeaturedWorks();
            return view('featured-works.admin.disapproved')->with('featured_works', $d_featured_works);
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }

    // approved featured works for admin
    public function AdminApproved()
    {
        if (Auth::user()->hasRole('admin')) {
            $new = new FeaturedWork();
            $d_featured_works = $new->getAllApprovedFeaturedWorks();
            return view('featured-works.admin.approved')->with('featured_works', $d_featured_works);
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }

    // ACTION FUNCTIONS

    // disable featured works by artist
    public function disable($id)
    {
        $user = Auth::user();
        $id = $user->id;
        $featured_work = FeaturedWork::find($id);
        if ($featured_work->user_id != $id) {
            return redirect('featured-works/artist/all')->with('error', 'unauthorised page');
        }
        $featured_work->disabled = 'true';
        $featured_work->save();
        return redirect('featured-works/artist/all')->with('success', 'Post disabled');
    }

    // Restore disabled fea$featured_work
    public function restore($id)
    {
        $user = Auth::user();
        $id = $user->id;
        $featured_work = FeaturedWork::find($id);
        if ($featured_work->user_id != $id) {
            return redirect('featured-works/artist/all')->with('error', 'unauthorised page');
        }
        $featured_work->disabled = 'true';
        $featured_work->save();
        return redirect('featured-works/artist/all')->with('success', 'Post disabled');
    }

    // Disapprove Artist Featured Work
    public function disapprove($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $featured_work = FeaturedWork::find($id);
            $featured_work->status = 'disapproved';
            $featured_work->save();
            return redirect('featured-works/admin/disapproved')->with('success', 'Post disabled');
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }

    // Approve Artist Featured Work
    public function approve($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $featured_work = FeaturedWork::find($id);
            $featured_work->status = 'approved';
            $featured_work->save();
            return redirect('featured-works/admin/approved')->with('success', 'Post Approved');
        }
        return redirect('/login')->with('error', 'unauthorised page');
    }
}
