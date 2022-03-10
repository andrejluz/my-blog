@extends('layouts.blog.blog_layout')

@section('title', 'Strapsniai pagal kategorija')

@section('content')

<div class="container">
    <h3 class="page-title pt-4">Straipsniai pagal kategorija <span style="color:red">{{ ucfirst($category['title']) }}</span> </h3>

    <div class="pagination-links-header pt-5 ">
        {!! $posts->links() !!}
    </div>



@if ($category->posts->count() == 0)
    <h4 style="color:red">Atsiprašome tačiau šiuo metu straipsnių nėra pagal Jūsų pasirinkta kategoriją</h4>

    @else
        @foreach ($posts as $post)
        <div class="posts-view ">
            <h3 class="post_title"><a href="{{ route('posts.show', $post['id']) }}">{{ ucfirst($post['title']) }}</a></h3>
            <p>{!! $post['text'] !!}</p>
            <a href="{{ route('posts.show', $post['id']) }}">Skaityti daugiau</a>
            <div class="edit_link d-flex justify-content-arround mt-2 post-view-link">

                @guest
                    <a href="#" onclick="no_user()" ><i class="far fa-thumbs-up" ></i>( {{ $post->likedUsers->count() }} )</a>
                    @else
                    <a href="#" onclick="document.getElementById('like-form-{{ $post['id']}}').submit();"><i class="far fa-thumbs-up"></i>( {{ $post->likedUsers->count() }} ) </a> | &nbsp;

                    <form action="{{ route('post.like', $post['id']) }}" method="POST" style="display:none" id="like-form-{{ $post['id'] }}">
                    @csrf

                    </form>
                @endguest

            <a href="{{ route('posts.show', $post['id']) }}"><i class="far fa-comments"></i>( {{ $post->comments->count() }} )</a> | &nbsp;
            <a href="">{!! substr($post->category->title,0,500) !!} ...</a> | &nbsp;
            <a href="">{{ date('yy m d') }}</a>
        </div>
        </div>
        @endforeach


@endif





    <div class="pagination-links mt-5 ">

        {!! $posts->links() !!}
    </div>


</div>



@endsection


@section('footer')
    @include('layouts.blog.blog_footer')
    @endsection


