@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card text-white bg-success">
                    <div class="card-body card-body">
                        <p><i class="cil-people"></i> Profile </p>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-left">Name</label>

                                    <div class="col-md-8">
                                        <label class="col-md-6 col-form-label">{{ Auth::user()->name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-left">Email</label>
                                    <div class="col-md-8">
                                        <label
                                            class="col-md-6 col-form-label">{{ Auth::user()->email }}</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
