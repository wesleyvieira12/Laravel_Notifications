@extends('layouts.app')

@section('content')
  <h1>Listagem dos Posts</h1>
  @forelse($posts as $post)
    <a href="{{ route('posts.show',$post->id)}}">
      {{$post->title}} ({{$post->comments->count()}})
    </a>
    <hr>

  @empty
    <p>Nada encontrado!</p>
  @endforelse

  {!! $posts->links() !!}
@endsection
