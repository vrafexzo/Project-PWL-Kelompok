@extends('layouts.main')

@section('container')
    <h2>{{ $post->title }}</h2>
    {{-- <h5>{{ $post["slug"] }}</h5> --}}
    {!! $post->body !!}
    <br>
    <a href="/blog">Back to Posts</a>
@endsection

Post::create([
    'title' => 'Judul Keempat',
    'excerp' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel mi id purus laoreet pretium eget non risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam at lorem eget metus fermentum faucibus. Etiam tristique id erat ac pellentesque. Nam mi magna, commodo vitae ullamcorper eu, ultrices non magna. Integer nec mi libero. Morbi sit amet consectetur enim.'
])