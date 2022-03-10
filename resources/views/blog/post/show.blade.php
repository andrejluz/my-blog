@extends('layouts.blog.blog_layout')

@section('title', 'Straipsnis --')

@section('content')

<div class="container">


<div class="post-item-content">
    <h3 class="page-title pt-5">{{  $post['title'] }}</h3>

    <p>{!! $post['text'] !!}</p>

</div>

<div class="advertising">
    {{-- cia bus talpinama reklama gali but --}}
</div>


<div class="edit_link d-flex justify-content-arround mt-4 pb-5 post-view-link">

   <!--like links include -->
   @include('layouts.blog.like_links')
</div>

<div class="pb-5">
    @comments([
        'model' => $post,
        'perPage' => 15
    ])

</div>



</div>

@endsection

@section('footer')
    @include('layouts.blog.blog_footer')
@endsection
