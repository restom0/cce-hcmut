@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-header">Welcome to Admin Site</h1>
                </div>
                <div class="col-12">
                    <div class="panel panel-default">
                        <img src="../resources/image/admin1.png" class="card-img-top img-responsive w-100" alt="admin">
                        <div class="panel-body">
                            <h3>{{ $user->name }}</h3>
                            <p>Email: {{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
