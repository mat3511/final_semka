@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label>Nadis</label>
                    <input name="title" type="text" placeholder="Vložte nadpis" class="form-control">
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea name="text" type="text" placeholder="Vložte text" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
