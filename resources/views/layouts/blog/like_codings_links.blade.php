@guest
<a href="#" onclick="no_user()" ><i class="far fa-thumbs-up" ></i>( {{ $coding->likedUsers->count() }} )</a> | &nbsp;
@else
<a href="#" onclick="document.getElementById('like-form-{{ $coding['id']}}').submit();"><i class="far fa-thumbs-up"></i>( {{ $coding->likedUsers->count() }} ) </a> | &nbsp;

<form action="{{ route('coding.like', $coding['id']) }}" method="POST" style="display:none" id="like-form-{{ $coding['id'] }}">
@csrf
</form>
@endguest

<a href="{{ route('codings.show', $coding['id']) }}"><i class="far fa-comments"></i>( {{ $coding->comments->count() }}   )</a> | &nbsp;
<a href="{{ route('codings-by-category',$coding->category->id )}}">{{ $coding->category->title }}</a> | &nbsp;
<a href="">{{ date('yy m d') }}</a>