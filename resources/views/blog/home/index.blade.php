@extends('layouts.blog.blog_layout')

@section('title', 'Pagrindinis')

@section('content')

<div class="container">
            <h3 class="page-title pt-4">Naujausi Straipsniai</h3>
        <div class="row d-flex justify-content-between content-width">

        @foreach( $posts as $post)
            <div class="post_content post_item">
                <h4 class="post_title"><a href="{{ route('posts.show', $post['id']) }}" class="post_title_link">{{ ucfirst($post->title) }}</a></h4>
                <p class="post_item_desc">
                    {!! substr($post->text,0,200) !!} ... <br />
                    <a href="{{ route('posts.show', $post['id']) }}">Skaityti daugiau ...</a>
                </p>
                <div class="edit_link d-flex justify-content-between">


      <!--like links include -->
      @include('layouts.blog.like_links')

                </div>
            </div>
            @endforeach

    </div>
</div>

<div class="posts-more-banner mt-5 text-center ">

    <h4 class="posts-more-banner-tittle">Daugiau straispnių, daugiau įdomybių !!! <a href="{{ route('posts.index') }}">Spausk čia...</a></h4>

</div>

@endsection



@section('category')
<div class="container">

    <div class="catgory_list_title mt-4">
        <h3 class="page-title pt-3">Kategorijų sąrašas</h3>
    </div>

    <div class="category_list mt-4 pb-5">
        <ul class=" d-flex justify-content-between">
            @foreach ($categories  as $category)
                <li><a href="{{ route('posts-by-category', $category['id']) }}">{{ $category['title'] }}</a></li>
            @endforeach
          </ul>

    </div>





</div>
@endsection


@section('footer')
    @include('layouts.blog.blog_footer')
@endsection





