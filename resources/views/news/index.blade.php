@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($news as $row)
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img" src="{{$row['path']}}">
                            <h5 class="card-title">{{$row['title']}}</h5>
                            <p class="card-text">{{$row['text']}}</p>
                            @auth
                                <a href="{{route('news.edit', $row['id'])}}" class="btn btn-primary btn-small">Edit</a>
                                <a href="{{route('news.delete', $row['id'])}}" class="btn btn-danger btn-primary btn-small">Delete</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
