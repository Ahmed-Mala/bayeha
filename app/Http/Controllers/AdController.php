<?php

namespace App\Http\Controllers;

use App\Ad;
use \App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Input;


class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $categories = Category::pluck('title','id');

        return view('ads.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = Auth::user();



        $request->validate([
        'title' => 'max:500|required',
         'content' => 'min:50|required',
      //  'categories' => 'required',
         'image' => 'required|max:2048'


        ]);
        $ad = new ad;
        $ad->title = $request['title'];
        $ad->content = $request['content'];
        $ad->user_ID = auth()->user()->id;

      //  $categories = array_values($request->categories);
      //  $ad->categories = $categories;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/', $fileName);
            $ad->image = $fileName;
            }
        $ad->save();




        //$categories = array_values($request->categories);
      // $user->ads()->create($request->all());

      //  $ad = $user->ads()->create($request->except('categories'));

       //$ad->categories()->attach($categories);
       return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        $categories = Category::pluck('title','id');
        $adCategories = $ad->categories()->pluck('id')->toArray();
        return view ('ads.edit', compact('categories', 'ad', 'adCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
      if(Auth::id() != $ad->user_id){
        return abort(401);
      }

      // شرط التعديل

     $request->validate([
         'title' => 'max:50|min:10|required',
        'content' => 'min:150|required',
       'categories' => 'required'


     ]);
      // $article->title = $request['title'];
      // $article->content = $request['content'];
      //$article->save();
      $ad->update($request->except('image'));

      $ad->categories()->sync($request->categories);

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
