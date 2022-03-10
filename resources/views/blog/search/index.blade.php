@extends('layouts.blog.blog_layout')

@section('title', 'Paieška')

@section('content')
<div class="container">
    <h3 class="page-title pt-4">Paieškos rezultatas</h3>

    <div class="pagination-links-header  pt-5 ">
        {!! $posts->links() !!}
    </div>

        @if($posts->isNotEmpty())
    @foreach ($posts as $post)
        <div class="posts-view ">
            <h3 class="post_title"><a href="{{ route('posts.show', $post['id']) }}">{{ ucfirst($post['title']) }}</a></h3>
            <p style="color: black">{!! $post['text'] !!}</p>
            <a href="{{ route('posts.show', $post['id']) }}">Skaityti daugiau</a>
            <div class="edit_link d-flex justify-content-arround mt-2 post-view-link">
            </div>
        </div>
    @endforeach
@else
    <div class="mb-5">
        <h3>Nieko nerasta pagal kreipimasi  <span style="color: black">{{ $search_input }}</span> </h3>
    </div>
@endif

                <div class="pagination-links mt-5 ">

                        {!! $posts->links() !!}
                </div>

</div>



@endsection

@section('footer')
    @include('layouts.blog.blog_footer')
@endsection
