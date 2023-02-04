@extends('layouts.app')
@section('content')
    <div class="text-center"><a href="{{ route("post.create") }}" class="btn btn-success mb-3 ">Create Post</a></div>
        <table class="table table-bordered text-start">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    @foreach ($created_at as $date)                
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{isset($post->user)?$post->user->name:''}}</td>

                            <td>{{$date}}</td>
                            <td>
                                <a href="{{ route("post.show",$post->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route("post.edit",$post->id) }}" class="btn btn-primary">Edit</a>
                                <a class="btn btn-danger" onclick="(confirm('Are you sure?') == true)?href='{{ route('post.destroy',$post->id) }}':href='#'">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                <tr>{{ $posts->links() }}</tr>
            </tbody>
        </table>
@endsection