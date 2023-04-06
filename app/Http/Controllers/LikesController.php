<?php

namespace App\Http\Controllers;

use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $like = new likes();

        $like->user_id = Session::get('user')->id;
        $like->image_id = $request->image_id;

        $like->save();

        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        likes::destroy($id);

        return redirect()->route('images.index');
    }
}
