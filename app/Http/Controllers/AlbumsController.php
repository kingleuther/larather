<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $req){
        $this->validate($req,[
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);

        //get file name with extension
        $filenameWithExt = $req->file('cover_image')->getClientOriginalName();
        //gete just the file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extension
        $extension = $req->file('cover_image')->getClientOriginalExtension();
        //create new file name
        $filenameToStore = $filename.'_'.time().'.'.$extension;        
        //upload image
        $path= $req->file('cover_image')->storeAs('public/album_covers', $filenameToStore);
        //create album
        $album = new Album;
        $album->name = $req->name;
        $album->description = $req->description;
        $album->cover_image = $filenameToStore;   
        $album->save();
        return redirect('/albums')->with('success', 'Album Created');
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
