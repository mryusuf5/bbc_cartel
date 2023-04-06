<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedinId = Session::get('user')->id;

        $images = DB::table('images')
            ->join('users', 'users.id', '=', 'images.user_id')
            ->select('users.name', 'users.profile_picture', 'images.*')
            ->get()
        ->map(function($image) use ($loggedinId){
            $likes = likes::where('user_id', $loggedinId)
                ->where('image_id', $image->id)
                ->get();

            $likeAmmount = likes::where('image_id', $image->id)
            ->get();

            $image->like_ammount = count($likeAmmount);

            if(count($likes) > 0)
            {
                $image->is_liked = $likes->first();
            }
            else
            {
                $image->is_liked = false;
            }

            return $image;
        });

        return view('user.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $image = new images();

        $image->title = $request->title;
        $image->description = $request->description;

        $picture = $request->file('image');
        $unfilteredPictureName = $picture->getClientOriginalName();
        $pictureName = str_replace(' ', '_', $unfilteredPictureName);
        $picture->move('assets/images/', $pictureName);

        $image->name = $pictureName;
        $image->path = $pictureName;
        $image->user_id = Session::get('user')->id;

        $image->save();

        return redirect()->route('images.create')->with('success', 'Foto opgeslagen!');

    }

    /**
     * Display the specified resource.
     */
    public function show(images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(images $images)
    {
        //
    }
}
