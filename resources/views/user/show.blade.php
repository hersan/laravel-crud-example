@extends('crud::layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-4">
            <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="{{asset($user->getAvatar())}}" alt="Card image cap">
                    <div class="card-body">
                    <h2 class="card-title text-primary">{{$user->name}}</h2>
                    <h5 class="card-subtitle mb-2 text-muted text-success">{{$user->email}}</h5>
                    <h6>registered since: <small class="text-muted">{{$user->since()}}</small></h6>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto atque dicta dolor dolore eaque est exercitationem iste magni, molestias nulla obcaecati perspiciatis quis quod sapiente, tenetur veritatis voluptatum? Repudiandae?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
