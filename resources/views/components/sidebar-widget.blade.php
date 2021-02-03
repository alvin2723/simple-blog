   <!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Add Button -->
    @role('Admin')
        <div class="my-4">
            <a href="{{route('view_form_create')}}" type="button" class="btn btn-block btn-primary">Create New Post</a>
        </div>
    @endrole
    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
        <form action="{{route('search')}}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{old('search')}}">
                <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
        
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled mb-0 row">
                    @foreach ($category as $item)
                        <li class="col-lg-6 mb-2">
                            <a href="{{route('search_category', $item->id)}}">{{$item->category_title}}</a>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>

</div>