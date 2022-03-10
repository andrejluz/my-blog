@extends('layouts.blog.blog_layout')

@section('title', ' Koding Straipsniai')

@section('content')

<div class="container">
    <h3 class="page-title pt-5 text-center">Koding --- viskas kas liečia kodo...</h3>
    <div class="pagination-links-header  pt-3 ">
        {!! $codings->links() !!}
        </div>

                @if($codings->count() == 0)
                    <h4>Šiuo metu nėra dar straipsnių, jie  kuriami...</h4>

                    @else
                        @foreach ($codings as $coding)
                            <div class="posts-view ">
                                <h3 class="post_title"><a href="{{ route('codings.show', $coding['id']) }}">{{ ucfirst($coding['title']) }}</a></h3>
                                <p>{!! $coding['text'] !!}</p>
                                <a href="{{ route('codings.show', $coding['id']) }}">Skaityti daugiau</a>
                                <div class="edit_link d-flex justify-content-arround mt-2 post-view-link">

                                    <!--like links include -->
                                    @include('layouts.blog.like_codings_links')
                                </div>
                            </div>
                        @endforeach
                    @endif




                <div class="pagination-links mt-5 ">

                        {!! $codings->links() !!}
                </div>
            {{-- <div class="post-clear-row">

            </div> --}}


</div>



@endsection

@section('footer')
    @include('layouts.blog.blog_footer')
@endsection

