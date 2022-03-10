@extends('layouts.blog.blog_layout')

@section('title', 'Straipsniai')

@section('content')

<div class="container">
    <div class="pagination-links-header  pt-5 ">

        {!! $posts->links() !!}
        </div>

            @foreach ($posts as $post)
            <div class="posts-view ">
                <h3 class="post_title"><a href="{{ route('posts.show', $post['id']) }}">{{ ucfirst($post['title']) }}</a></h3>
                <p>{!! substr($post->text,0,750) !!} ...</p>
                <a href="{{ route('posts.show', $post['id']) }}">Skaityti daugiau</a>
                <div class="edit_link d-flex justify-content-arround mt-2 post-view-link">

                      <!--like links include -->
                        @include('layouts.blog.like_links')
                </div>
            </div>
            @endforeach

                <div class="pagination-links mt-5 ">

                        {!! $posts->links() !!}
                </div>
            {{-- <div class="post-clear-row">

            </div> --}}


</div>



@endsection

@section('footer')
    @include('layouts.blog.blog_footer')
@endsection


