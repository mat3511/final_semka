<div class="form-group text-danger">
     @foreach($errors->all() as $error)
         {{ $error }}<br>
    @endforeach
</div>

<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label class="popis" for="name">Full name</label>
        <input class="form-control" id="name" name="name" placeholder="Full name" value="{{ old ('name', @$model->name) }}">
    </div>
    <div class="form-group">
        <label class="popis" for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old ('email', @$model->email) }}">
    </div>
    <div class="form-group">
        <label class="popis" for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label class="popis" for="password">Password again</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
