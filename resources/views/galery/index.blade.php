@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($galeries as $gallery)
                <img class="obrazky col-sm-4" src="{{ $gallery['path'] }}" alt="Images">
            @endforeach
        </div>
    </div>
@endsection
