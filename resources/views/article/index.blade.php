@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$article['title']}}</h5>
                    <h6 class="card-title">{{$article['header']}}</h6>
                    <p class="card-text">{{$article['text']}}</p>
                    @auth
                    <a href="{{route('article.edit', $article['id'])}}" class="btn btn-primary btn-small">Edit</a>
                    <a href="{{route('article.delete', $article['id'])}}" class="btn btn-danger btn-primary btn-small">Delete</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

