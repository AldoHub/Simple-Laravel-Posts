@extends('layouts.app')
@section('content')
    @parent
    <section class="flex">
         <div class="first-row">
            <h2>create a new post</h2>
        </div>

        <div class="second-row">
            {!! Form::open(['action' => 'posts@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
                <div class="form-group">
                    {{Form::label('title','Post Title')}}
                    {{Form::text('title', '',['placeholder' => 'This is the post title' ])}}
                </div> 
                <div class="form-group">
                    {{Form::label('content','Post Content')}}
                    {{Form::textarea('content', '',['placeholder' => 'This is the content for the post' ])}}
                </div> 
                <div class="form-group">
                    {{Form::label('cover','Post cover')}}
                    {{Form::file('cover', '')}}
                </div> 

                {{Form::submit('Create Post', '')}}

            {!! Form::close() !!}
        </div>


    </section>




@stop    