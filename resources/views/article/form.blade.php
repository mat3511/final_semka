<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>

<form method="post" action="{{$action}}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" id="title" type="text" placeholder="Enter title" class="form-control" value="{{ old ('title', @$model->title) }}" required>
    </div>
    <div class="form-group">
        <label for="header">Header</label>
        <input name="header" id="header" type="text" placeholder="Enter header" class="form-control" value="{{ old ('header', @$model->header) }}" required>
    </div>
    <div class="form-group">
        <label for="text">Text</label>
        <textarea name="text" id="text" placeholder="Enter text" class="form-control" required>{{ old ('text', @$model->text) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>


