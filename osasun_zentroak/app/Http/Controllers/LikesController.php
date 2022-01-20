<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes=Likes::all();

        return view('likes.index', compact('likes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('likes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'zentroarenKodea' => 'required',
        ]);
  
        Likes::create($request->all());
  
        return redirect()->route('likes.index')->with('success','Like created successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Likes $likes)
    {
        return view('likes.show',compact('likes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Likes $likes)
    {
        return view('likes.edit', compact('likes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Likes $likes)
    {
        $request->validate([
            'userId' => 'required',
            'zentroarenKodea' => 'required',
        ]);
  
        $likes->update($request->all());
  
        return redirect()->route('likes.index')->with('success','Like updated successfully');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Likes $likes)
    {
        $likes->delete();

        return redirect()->route('likes.index')
                        ->with('success','like deleted successfully');

    }

    public function addLike(Request $request){
        $like = new Likes;
        $like->userId = $request->userId;
        $like->zentroarenKodea = $request->zentroarenKodea;
        $like->save();
        return response()->json(['message'=>'New post created']);
    }
    public function unLike(Request $request){
        
    }
    public function __construct()
    {
        $user = auth()->user();

        view()->share('user', $user);
    }
}