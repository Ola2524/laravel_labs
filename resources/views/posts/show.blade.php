@extends('layouts.app')
@section('content')
        <div class="card">
            <h5 class="card-header">Post Info</h5>
            <div class="card-body">
                <h5 class="card-title">Title:- {{$post['title']}}</h5>
                <h5 class="card-title">Description:-</h5>
                <p class="card-text">{{$post['description']}}</p>
            </div>
        </div>

        <div class="card mt-5">
            <h5 class="card-header">Post Creator Info</h5>
            <div class="card-body">
                <h5 class="card-title">Name:- {{isset($post->user)?$post->user->name:''}}</h5>
                <h5 class="card-title">Email:- {{isset($post->user)?$post->user->email:''}}</h5>
                <h5 class="card-title">Created At:- {{$post['created_at']}}</h5>
            </div>
        </div>
@endsection