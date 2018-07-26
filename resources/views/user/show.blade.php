@extends('crud::layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <h5 class="card-header">Show User</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Nombre</strong>
                        </div>
                        <div class="col-md-6">
                            {{$user->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>E-mail</strong>
                        </div>
                        <div class="col-md-6">
                            {{$user->email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
