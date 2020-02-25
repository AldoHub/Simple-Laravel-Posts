@extends('layouts.app')
@section('content')
    @parent
    <section class="flex">
        <div class="first-row">
        
        <h2>Post Options </h2>
            <div>
                <button id="openPanel">Open Edit Panel</button>
            
                <!-- show the form that will allow us to delete the post-->
                {!! Form::open(["action" => ["posts@destroy", $current->id], "method" => "POST", "class" => "delete"]) !!}
                    {{Form::hidden("_method","DELETE")}}
                    {{Form::submit('Delete Post', '')}}
                {!! Form::close() !!}  
            </div>
        </div>


        <div class="second-row">
            <h2>{{$current->title}}</h2>

            <img src="../storage/covers/{{$current->cover}}" />
            <div>
                {{$current->content}}
            </div>
        </div>
    </section>

    <!-- add the edit panel -->
   <div class="edit-panel">
        <button id="closePanel">Close Edit Panel </button> 
        {!! Form::open(['action' => ['posts@update', $current->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
            <div class="form-group">
                {{Form::label('title','Post Title')}}
                {{Form::text('title', $current->title ,['placeholder' => 'This is the post title' ])}}
            </div> 
            
            <div class="form-group">
                {{Form::label('content','Post Content')}}
                {{Form::textarea('content', $current->content,['placeholder' => 'This is the content for the post' ])}}
            </div> 
    
            <div class="form-group">
                {{Form::label('cover','Post cover')}}
                {{Form::file('cover', '')}}
            </div> 

            {{Form::hidden("imagename", $current->cover)}}

            {{Form::submit('Update Post', '')}}
            
            {{Form::hidden("_method", "PUT")}}

        {!! Form::close() !!}
    </div>
@stop