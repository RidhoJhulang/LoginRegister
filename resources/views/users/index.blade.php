@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> List Users
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th style="text-align: center;">Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            @if (count($listUser) <= 0) 
                                <tr>
                                    <td colspan="9" class="text-center">Data Empty</td>
                                </tr>
                            @else
                                <?php $no = 1; ?>
                                <tbody>
                                    @foreach($listUser as $row)
                                    <tr>
                                        <td class="text-center">{{$no}}</td>
                                        <td>
                                            <div style="text-align:center; vertical-align:middle;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger delete-confirm" data-id="{{ $row->id }}" tooltip="Delete"><i class="cil-trash"></i></button>
                                                <button type="button" class="reset-pass btn btn-info btn-md mr-1 btn-reset-pass"  data-reset="{{$row->id}}" tooltip="Reset password"><i class="cil-reload"></i></button>
                                            </div>
                                        </td>
                                        <td style="vertical-align:middle;">{{ $row->name}}</td>
                                        <td style="vertical-align:middle;">{{ $row->email }}</td>
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                            @endif
                                </tbody>
                        </table>
                        {{ $listUser->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "user/destroy/"+id,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "_token": token,
                        method: '_DELETE',
                        submit: true},
                }).always(function (data) {
                    swal("Done!","It was succesfully deleted!","success");
                    location.reload();
                });
            }else{
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
    $('.btn-reset-pass').on('click', function (event) {
        event.preventDefault();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var id = $(this).data('reset');
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Password Reset',
            text: 'User password will be reset to default i.e Password12345!',
            icon: 'warning',
            buttons: ["Cancel", "Reset"],
    }).then(function(isConfirm) {
    if (isConfirm) {
        $.ajax({
            url: "user/resetpass/"+id,
            type: 'post',
            dataType: 'json',
            beforeSend: function(xhr) {
                $('.loading').removeClass('d-none');
            },
            data: { 
                "_token": token,
                submit: true},
        })
        .done(function (data, textStatus, xhr) {
            if(200 == xhr.status) {
                swal("Done!", data.message, "success");
            }
            else {
                swal("Failed", data.message, "error");
            }
        })
        .complete(function (data) {
            $('.loading').addClass('d-none');
            $('#tableListUsers').DataTable().draw(false);
        });
    }else{
            swal("Cancelled", "Password still same as always", "error");
        }
    });
});
</script>
@endsection