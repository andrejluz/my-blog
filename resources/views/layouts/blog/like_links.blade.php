@guest
<a href="#" onclick="no_user()" ><i class="far fa-thumbs-up" ></i>( {{ $post->likedUsers->count() }} )</a> | &nbsp;
@else
<a href="#" onclick="document.getElementById('like-form-{{ $post['id']}}').submit();"><i class="far fa-thumbs-up"></i>( {{ $post->likedUsers->count() }} ) </a> | &nbsp;

<form action="{{ route('post.like', $post['id']) }}" method="POST" style="display:none" id="like-form-{{ $post['id'] }}">
@csrf
</form>
@endguest

<a href="{{ route('posts.show', $post['id']) }}"><i class="far fa-comments"></i>( {{ $post->comments->count() }}   )</a> | &nbsp;
<a href="{{ route('posts-by-category',$post->category->id )}}">{{ $post->category->title }}</a> | &nbsp;
<a href="">{{ date('yy m d') }}</a>