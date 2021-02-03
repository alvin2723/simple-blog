<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="my-4">All Posts
    </h1>
    <!-- Blog Post -->
    @foreach ($blog as $item)
        <div class="card mb-4">
            <img class="card-img-top"  src="{{ url('public/image/'.$item->img_url) }}" alt="Card image cap"  width="400"height="400">
            <div class="card-body">
                <h2 class="card-title">{{$item->post_title}}</h2>
                <p class="card-text">{{substr($item->post_desc, 0,  90)}}</p>
                <a href="{{route('detail-post', $item->id)}}" class="btn btn-primary">Read More &rarr;</a>
                @role('Admin')
                <form action="api/post/delete/{{$item->id}}" method="post" class="d-inline">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete Post</button>
                </form>
                @endrole
            </div>
            <div class="card-footer text-muted">
                Posted on {{$item->created_at->format('d-M-Y')}} 
            
            </div>
        </div>
    @endforeach
    {{$blog->links()}}

</div>