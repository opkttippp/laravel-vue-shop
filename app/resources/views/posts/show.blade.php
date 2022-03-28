@foreach($posts as $post)
    <p>{{$post->name}} -- {{$post->subject}}</p>
    <p>{{$post->review}} -- {{$post->email}}</p>
    <hr>
@endforeach
{{ $posts->onEachSide(5)->links() }}
{{$a}}
{{--{{ $users->onEachSide(5)->links() }}--}}
{{--<p>{{$posts->name}}</p>--}}
{{--<p>{{$posts->review}}</p>--}}
{{--<hr>--}}
