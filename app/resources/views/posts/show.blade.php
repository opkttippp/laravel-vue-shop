@foreach($posts as $post)
    <p>{{$post->name}} -- {{$post->subject}}</p>
    <p>{{$post->review}} -- {{$post->email}}</p>
    <hr>
@endforeach

{{--<p>{{$posts->name}}</p>--}}
{{--<p>{{$posts->review}}</p>--}}
{{--<hr>--}}
