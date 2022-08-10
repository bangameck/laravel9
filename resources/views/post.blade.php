@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-8">
                <article>
                    <h1 class="mb-5">{{ $post->title }}</h1>
                    <p><b>By. <a href="/posts?author={{ $post->author->username }}"
                                class="text-decoration-none">{{ $post->author->name }}</a> in <a
                                href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></b></p>

                    @if ($post->image)
                        <div style="max-height: 400px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                class="img-fluid mb-3">

                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                            alt="{{ $post->category->name }}" class="img-fluid mb-3">
                    @endif

                    {!! $post->body !!}

                    <a href="/posts">Kembali </a>
                </article>
            </div>
        </div>
    </div>
@endsection
