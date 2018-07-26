@extends('crud::layout.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">User List</h5>
                <div class="card-body">
                    <p class="card-text"><a href="{{route('users.create')}}" class="btn btn-success">New User</a></p>
                    @include('crud::layout.alerts')
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{route('users.show', ['user' => $user->id])}}">Show</a>
                                        <a class="btn btn-info btn-sm" href="{{route('users.edit', ['user' => $user->id])}}">Edit</a>
                                        <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
                                            @csrf
                                            {!! method_field('delete') !!}
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" data-toggle="tooltip">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
