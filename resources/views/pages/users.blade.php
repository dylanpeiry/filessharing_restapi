@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($users as $user)
                    <a>Name: {{$user->name}} ||</a>
                    <a>Email: {{$user->email}} ||</a>
                    <a>Role: {{$user->id_role}} ||</a>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
