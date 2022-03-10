@extends('layouts.blog.blog_layout')

@section('title', 'Portfolio')

@section('content')

<div class="container">
            <h3 class="page-title pt-4 text-center">Portfolio</h3>
        <div class="row d-flex justify-content-between content-width text-center pt-5 pb-5">

            @if($portfolios->count() == 0)
                <h4>Darbai dar nėra įkelti, tačiau tai laikinai ...</h4>

                @else
                    @foreach( $portfolios as $portfolio)
                        <div class="post_item portfolio-content post_content"  style="width: 30%" >
                            <h4 class="post_title"><a href="http://{{ ($portfolio->title) }}" class="post_title_link">{{ ucfirst($portfolio->title) }}</a></h4>
                            <p class="post_item_desc">
                                {!! $portfolio->text !!} <br />
                            </p>
                        </div>
                    @endforeach
                @endif



    </div>
</div>
@endsection

@section('footer')
    @include('layouts.blog.blog_footer')
@endsection










