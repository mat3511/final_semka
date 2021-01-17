<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>

<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label class="popis">Title</label>
        <input name="title" id="title" type="text" placeholder="Enter title" class="form-control" value="{{ old( 'title', @$model->title) }}" required>
    </div>
    <div class="form-group">
        <label class="popis">Header</label>
        <input name="header" id="header" type="text" placeholder="Enter header" class="form-control" value="{{ (@$model->header) }}" required>
    </div>
    <div class="form-group">
        <label class="popis">Text</label>
        <textarea name="text" id="text" type="text" placeholder="Enter text" class="form-control" value="{{ (@$model->text) }}" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary tlacidlo">Save</button>
</form>


