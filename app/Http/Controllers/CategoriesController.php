<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    public function index()
    {
        $new = new Category();
        $categories = $new->getCategories();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new = new Category();
        $categories = $new->getCategories();
        return view('categories.create')->with('categories', $categories);
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
            'name' => 'required'
        ]);
        $name = $request->input('name');
        $arr = explode(" ", $name);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($name);
        }

        $category = new Category();
        $category->name = $name;
        $category->link = $link;
        $category->save();

        return redirect('/categories')->with('success', 'Post created');
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
        $category = Category::find($id);
        return view('categories.edit')->with('post', $category);
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
            'name' => 'required'
        ]);
        $name = $request->input('name');
        $arr = explode(" ", $name);
        if (!empty($arr)) {
            $link = strtolower(join("-", $arr));
        } else {
            $link = strtolower($name);
        }

        $category = Category::find($id);
        $category->name = $name;
        $category->link = $link;
        $category->save();

        return redirect('/categories')->with('success', 'Post edited');
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
    // Archive category
    public function disable($id)
    {
        $category = Category::find($id);
        $category->disabled = 'true';
        $category->save();
        return redirect('/categories')->with('success', 'Post Disabled');
    }

    // Restore Disabled category
    public function restore($id)
    {
        $category = Category::find($id);
        $category->disabled = 'false';
        $category->save();
        return redirect('/categories/disabled')->with('success', 'Post Restored');
    }

    // Display Disabled Categories
    public function disabled()
    {
        $new = new Category();
        $d_categories = $new->getDisCategories();
        return view('categories.disabled')->with('categories', $d_categories);
    }
}
