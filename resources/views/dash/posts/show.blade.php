@extends('dash.lay.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <article>
                    <h1 class="mb-5">{{ $post->title }}</h1>
                    <a href="/dashboard/posts" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Back to My
                        Posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-3"><span
                            data-feather="edit"></span> Edit Post</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                            <span data-feather="x-circle"></span> Delete</button>
                    </form>
                    @if ($post->image)
                        <div style="max-height: 350px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                class="img-fluid mb-3">

                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                            alt="{{ $post->category->name }}" class="img-fluid mb-3">
                    @endif

                    {!! $post->body !!}

                    <a href="/dashboard/posts">Kembali </a>
                </article>
            </div>
        </div>
    </div>
@endsection
