@foreach ($posts as $post)
    {{ $post->user()->name}}
@endforeach