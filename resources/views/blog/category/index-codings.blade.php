@extends('layouts.blog.blog_layout')

@section('title', 'Strapsniai pagal kategorija')

@section('content')

<div class="container">
    <h3 class="page-title pt-4">Straipsniai pagal kategorija <span style="color:red">{{ ucfirst($category['title']) }}</span> </h3>

    <div class="pagination-links-header pt-5 ">
        {!! $codings->links() !!}
    </div>



@if ($category->codings->count() == 0)
    <h4 style="color:red">Atsiprašome tačiau šiuo metu straipsnių nėra pagal Jūsų pasirinkta kategoriją</h4>

    @else
        @foreach ($codings as $coding)
        <div class="posts-view ">
            <h3 class="post_title"><a href="{{ route('codings.show', $coding['id']) }}">{{ ucfirst($coding['title']) }}</a></h3>
            <p>{!! $coding['text'] !!}</p>
            <a href="{{ route('codings.show', $coding['id']) }}">Skaityti daugiau</a>
            <div class="edit_link d-flex justify-content-arround mt-2 post-view-link">

                @guest
                    <a href="#" onclick="no_user()" ><i class="far fa-thumbs-up" ></i>( {{ $coding->likedUsers->count() }} )</a>
                    @else
                    <a href="#" onclick="document.getElementById('like-form-{{ $coding['id']}}').submit();"><i class="far fa-thumbs-up"></i>( {{ $coding->likedUsers->count() }} ) </a> | &nbsp;

                    <form action="{{ route('coding.like', $coding['id']) }}" method="POST" style="display:none" id="like-form-{{ $coding['id'] }}">
                    @csrf

                    </form>
                @endguest

            <a href="{{ route('posts.show', $coding['id']) }}"><i class="far fa-comments"></i>( {{ $coding->comments->count() }} )</a> | &nbsp;
            <a href="">{{ $coding->category->title }}</a> | &nbsp;
            <a href="">{{ date('yy m d') }}</a>
        </div>
        </div>
        @endforeach


@endif





    <div class="pagination-links mt-5 ">

        {!! $codings->links() !!}
    </div>


</div>



@endsection

@section('footer')
    @include('layouts.blog.blog_footer')
@endsection

