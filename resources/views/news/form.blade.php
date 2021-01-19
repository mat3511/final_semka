<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>

<form method="post" action="{{$action}}}">
    @csrf
    @method($method)
    <div class="form-group">
        <label class="popis">Title</label>
        <input name="title" id="title" type="text" placeholder="Enter title" class="form-control" value="{{old ('title', @$model->title)}}" required>
    </div>
    <div class="form-group">
        <label class="popis">Text</label>
        <textarea name="text" id="text" type="text" placeholder="Enter text" class="form-control" required>{{ old ('text', @$model->text) }}</textarea>
    </div>
    <div class="form-group">
        <label class="popis">Title</label>
        <input name="path" id="path" type="text" placeholder="Enter path to image" class="form-control" value="{{ old ('path', @$model->path)}}" required>
    </div>
    <button type="submit" class="btn btn-primary tlacidlo">Save</button>
</form>
