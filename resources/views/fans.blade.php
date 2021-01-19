@extends('layouts.app')

@section('content')
<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col md 12">
                <div class="card">
                    <div class="card-header">
                        Fans   <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#fanModal">Add</a>
                    </div>
                    <div class="card-body">
                        <table id="fanTable" class="table">
                            <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Nick name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fans as $fan)
                                <tr id="sid{{ $fan->id }}">
                                    <td>{{ $fan->first_name }}</td>
                                    <td>{{ $fan->last_name }}</td>
                                    <td>{{ $fan->nick_name }}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deleteFans({{ $fan->id }})" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Add -->
<div class="modal fade" id="fanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new fan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="fanForm">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="nick_name">Nick name</label>
                        <input type="text" class="form-control" id="nick_name">
                    </div>
                    <button type="submit" class="btn small btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#fanForm").submit(function(e){
        e.preventDefault();

        let first_name = $("#first_name").val();
        let last_name = $("#last_name").val();
        let nick_name = $("#nick_name").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('fan.add') }}",
            type: "POST",
            data:{
                first_name:first_name,
                last_name:last_name,
                nick_name:nick_name,
                _token:_token
            },
            success:function (response)
            {
                if(response)
                {
                    $("#fanTable tbody").prepend('<tr><td>'+response.first_name+'</td><td>'+response.last_name+'</td><td>'+response.nick_name+'</td></tr>');
                    $("#fanForm")[0].reset();
                    $("#fanModal").modal('hide');
                }
            }
        });
    });
</script>

<script>
    function deleteFans(id)
    {
        if(confirm("Do you really want to delete this fan?"))
        {
            $.ajax({
                url: 'fans/' + id,
                type: 'DELETE',
                data: {
                    _token : $("input[name=_token]").val()
                },
                success:function (response)
                {
                    $("#sid" + id).remove();
                }
            });
        }
    }
</script>
@endsection

