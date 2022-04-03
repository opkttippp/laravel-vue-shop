@foreach($posts as $post)
    <p>{{$post->name}} -- {{$post->subject}}</p>
    <p>{{$post->review}} -- {{$post->email}}</p>
    <hr>
@endforeach
{{--{{ $posts->onEachSide(5)->links() }}--}}
{{--{{$a}}--}}
{{--@php--}}
{{--echo url()->previous();--}}
{{--echo '</br>';--}}
{{--echo url()->current();--}}
{{--echo '</br>';--}}
{{--echo url()->full();--}}
{{--echo '</br>';--}}
{{--echo URL::current()--}}
{{--@endphp--}}
{{--{{ $users->onEachSide(5)->links() }}--}}
{{--<p>{{$posts->name}}</p>--}}
{{--<p>{{$posts->review}}</p>--}}
{{--<hr>--}}
