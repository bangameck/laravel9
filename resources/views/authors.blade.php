{{-- @dd($post) --}}
@extends('layout.main')

@section('container')
    <h1 class="mb-5">Author List</h1>
    @foreach ($authors as $penulis)
        <ul>
            <li>
                <h2><a href="/author/{{ $penulis->username }}" class="text-decoration-none">{{ $no++ }}
                        {{ $penulis->name }}</a></h2>
            </li>

        </ul>

        </article>
    @endforeach
@endsection
