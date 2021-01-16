@extends('layouts.app')
<?php /** @var Array $data */ ?>
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            /** @var \App\Models\Article $article */
            foreach ($data['articles'] as $article) { ?>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $article->getTitle() ?></h5>
                    <p class="card-text"><?= $article->getText() ?></p>
                    <a href="?c=home&a=edit&id=<?=$article->getId()?>" class="btn btn-primary btn-small">Edit</a>
                    <a href="?c=home&a=delete&id=<?=$article->getId()?>" class="btn btn-danger btn-primary btn-small">Delete</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="?c=home&a=add" class="btn btn-primary">Pridaj článok</a>
        </div>
    </div>
</div>
@endsection

