@extends('layouts.app')

@content('title', 'Publications')

@section('content')
    <h1>Publications</h1>

    <ul>
        @foreach ($publications as $publication)
            <li>
                <a href="{{ route('publications.show', $publication) }}">
                    {{ $publication->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection