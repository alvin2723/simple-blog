<?php

namespace App\Http\Controllers;

use App\BlogCategory as AppBlogCategory;
use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Controllers\api_blogcontroller;
use App\Http\Requests\BlogPostRequest;
use App\BlogCategory;

class BlogPostController extends Controller
{
    protected $api_blogcontroller;
    public function __construct(api_blogcontroller $api_blogcontroller)
    {
        $this->api_blogcontroller = $api_blogcontroller;
    }
    public function index()
    {
        $blog = BlogPost::paginate(4);
        $category = BlogCategory::all();
        return view('home', ['blog' => $blog, 'category' => $category]);
    }
    public function view($id)
    {

        $blog = BlogPost::where('id', $id)->first();
        $category = BlogCategory::all();
        return view('detail-post', ['blog' => $blog, 'category' => $category]);
    }
    public function view_form_create()
    {
        $category = BlogCategory::all();
        return view('form-create', ['category' => $category]);
    }
    public function store(BlogPostRequest $request)
    {
        $this->api_blogcontroller->insert_data_post($request);
        session()->flash('message', 'Data Berhasil Ditambah');
        return $this->index();
    }
    public function view_form_update($id)
    {
        $blog = BlogPost::where('id', $id)->first();
        $category = BlogCategory::all();
        return view('update-post', ['blog' => $blog, 'category' => $category]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $blog = BlogPost::where('post_title', 'like', "%" . $search . "%")->paginate();
        $category = BlogCategory::all();

        return view('home', ['blog' => $blog, 'category' => $category]);
    }
    public function search_category($category_id)
    {
        $blog = BlogPost::where('category_id',  'like', "%" . $category_id . "%")->paginate();
        $category = BlogCategory::all();

        return view('home', ['blog' => $blog, 'category' => $category]);
    }
}
