@extends("layouts.app")
@section("content")
    @parent
       <header>
            <h1>Laravel Posts <br/> For Everyone</h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum magna vel nisl iaculis dignissim. Sed neque odio, scelerisque ac ligula non, molestie ultrices ex</p>
        
            <img class="hero" src="./Presentation.svg" />
        </header>

        <section>
            <h2>Posts </h2>
            <img class="shape" src="../_Mask Group 1.svg" />
            <!--<img class="shape" src="" />-->
            <div class="posts-container">
                @if(count($posts) > 0)
                    @foreach ( $posts as $post )
                        <div class="post">
                            <a href="posts/{{$post->id}}">
                                <div class="cover" style='background:url("storage/covers/{{$post->cover}}");'></div>
                            </a>
                            <p>{{$post->title}}</p>
                        </div>
                    @endforeach
                @else
                    <div class="no-posts">
                        <p>There are no posts to display, start adding posts to show something</p>
                    </div>    
                @endif
            </div>    
        </section>

@stop