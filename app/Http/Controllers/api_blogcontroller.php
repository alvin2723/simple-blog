<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Requests\BlogPostRequest;

class api_blogcontroller extends Controller
{
    public function get_all_post()
    {
        $blog = BlogPost::all();
        return response()->json($blog, 200);
    }
    public function get_post($id)
    {
        $blog = BlogPost::where('id', $id);
        return response()->json($blog, 200);
    }

    public function insert_data_post(BlogPostRequest $request)
    {
        $request->validated();
        $insert_post = new BlogPost;
        if ($files = $request->file('img_url')) {
            $dest_path = 'public/image/';
            $data_image = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($dest_path, $data_image);
            $insert_post->img_url = $data_image;
        }
        $insert_post->post_title = $request->post_title;
        $insert_post->post_desc = $request->post_desc;
        $insert_post->category_id = $request->category_id;
        $insert_post->save();

        return response([
            'status' => 'OK',
            'message' => 'Data Berhasil Ditambah',
            'udpate-data' => $insert_post
        ], 200);
    }

    public function delete_data_post($id)
    {
        $cek_data = BlogPost::where('id', $id);
        if ($cek_data) {
            BlogPost::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data Dihapus',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Kode Barang Tidak Ditemukan',
            ], 404);
        }
    }

    public function update_data_post(BlogPostRequest $request, $id)
    {
        $check_post = BlogPost::where('id', $id)->first();
        if ($check_post) {
            $data_post = BlogPost::find($id);
            if ($files = $request->file('img_url')) {
                $dest_path = 'public/image/';
                $data_image = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($dest_path, $data_image);
                $data_post->img_url = $data_image;
            }
            $data_post->post_title = $request->post_title;
            $data_post->post_desc = $request->post_desc;
            $data_post->save();

            return response([
                'status' => 'OK',
                'message' => 'Data Berhasil Diupdate',
                'udpate-data' => $data_post
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
    }
}
