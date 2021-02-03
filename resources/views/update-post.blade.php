@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            {{-- Form Create Post --}}
            <div class="col-12">
                <h1 class="text-center">Update Post</h1>
                <form action="/api/post/update/{{$blog->id}}" method="POST" class="my-5" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="postTitle">Post Title</label>
                        <input type="text" class="form-control" id="post_title" name="post_title" aria-describedby="emailHelp" value="{{$blog->post_title}}">
                        @error('post_title') <span class="text-danger">{{ $message }}adfdsfsdfsd</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="postTitle">Post Description</label>
                        <textarea class="form-control" id="post_desc" rows="3" name="post_desc" >{{$blog->post_desc}}</textarea>
                        @error('post_desc') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="postTitle">Image URL</label>
                        <input type="file" class="form-control-file" id="img_url" name="img_url">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection