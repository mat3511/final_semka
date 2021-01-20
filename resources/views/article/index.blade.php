@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-6">
            <div class="card clanok_karta">
                <div class="card-body">
                    <h4 class="card-title">{{$article['title']}}</h4>
                    <h5 class="card-title">{{$article['header']}}</h5>
                    <p class="card-text">{{$article['text']}}</p>
                    @auth
                    <a href="{{route('article.edit', $article['id'])}}" class="btn button_edit btn-small">Edit</a>
                    <a href="{{route('article.delete', $article['id'])}}" class="btn btn-danger btn-secondary btn-small">Delete</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

