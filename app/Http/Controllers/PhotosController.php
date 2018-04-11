<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;  
class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $req){
        $this->validate($req,[
            'title' => 'required',
            'photos' => 'image|max:1999'
        ]);

        //get file name with extension
        $filenameWithExt = $req->file('photo')->getClientOriginalName();
        //gete just the file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extension
        $extension = $req->file('photo')->getClientOriginalExtension();
        //create new file name
        $filenameToStore = $filename.'_'.time().'.'.$extension;        
        //upload image
        $path= $req->file('photo')->storeAs('public/photos/'.$req->album_id, $filenameToStore);
        //create photo
        $photo = new Photo  ;
        $photo->album_id = $req->album_id;
        $photo->title = $req->title;
        $photo->description = $req->description;
        $photo->size = $req->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;   
        $photo->save();
        return redirect('/albums/'.$req->album_id)->with('success', 'Photo Uploaded');
    }

    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }
  
    public function destroy($id){
        $photo = Photo::find($id);

        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            
            return redirect('/albums')->with('success', 'Photo Deleted');
        }
    }
}
