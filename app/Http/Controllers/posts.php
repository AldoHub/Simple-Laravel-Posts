<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class posts extends Controller
{
    //index route
    public function index(){
        $posts = Post::all();
        return view("index")->with("posts", $posts);
    }

    //get the current post using the post $id
    public function show(String $id){
        $currentPost = Post::find($id);
        return view("show")->with("current", $currentPost);
    }


    //create route
    public function create(){
        return view("create");
    }

    //handle create action post 
    public function store(Request $req){
        
        //validate
        $this->validate(
            $req,
            [
                "title" => "required",
                "content" => "required",
                "cover" => "required|image|max:4999"
            ]
        );

        //handle file in order to store it
        $originalFile = $req->file("cover")->getClientOriginalName();
        $filename = pathinfo($originalFile, PATHINFO_FILENAME);
        $fileExt = $req->file("cover")->getClientOriginalExtension();
        
        $renameFile = $filename . "-" . time() . "." . $fileExt; 
        
        $path = $req->file("cover")->storeAs("public/covers", $renameFile);
        
        //create the new post
        $post = new Post;     
        $post->title = $req->input("title");
        $post->content = $req->input("content");
        $post->cover = $renameFile;

        
        //save data
        $post->save();
        return redirect("/");

    }


    //update the current post
    public function update(Request $req, String $id){

        $this->validate(
            $req, [
                "title" =>  "required",
                "content" => "required",
                "cover" => "nullable|image|max:4999"
            ]
        );

        if(empty($req->file("cover"))){
            //no new image to add, get the one we already have and 
            //overwrite the name
            $renamedFile = $req->input("imagename");
        }else{
            //there is an image that we want to add, make sure to delete the last one
            $originalFile = $req->file("cover")->getClientOriginalName();
            $filename = pathinfo($originalFile, PATHINFO_FILENAME);
            $fileExt = $req->file("cover")->getClientOriginalExtension();
            $renamedFile = $filename . "-" . time() . "." . $fileExt;

            $path = $req->file("cover")->storeAs("public/covers", $renamedFile);

            //delete the last image here please
            $prevImage = $req->input("imagename");
            $deleteCover = "storage". DIRECTORY_SEPARATOR . "covers" . DIRECTORY_SEPARATOR . $prevImage;
            unlink(public_path($deleteCover));
        }


        //its time to update
        $post = Post::find($id);
        $post->title = $req->input("title");
        $post->content = $req->input("content");
        $post->cover = $renamedFile;

        $post->save();   

        return redirect("/posts". "/" . $id );
    }


    //delete the post using the post $id
    public function destroy(String $id){

        $post = Post::find($id);
        $postCover = $post->cover;
        $deleteCover = "storage" . DIRECTORY_SEPARATOR . "covers" . DIRECTORY_SEPARATOR . $postCover; 
        unlink(public_path($deleteCover));
        $post->delete();
        return redirect("/posts");

    } 

}
