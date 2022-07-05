<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blogs::orderBy('id', 'DESC')->paginate(5);
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|
                        unique:categories|
                        max:255',
                'description' => 'required|
                            max:255',
                'image' => 'image|
                        mimes:jpg,png,jpeg,gif,svg|
                        max:2048|
                        dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required',
                'content' => 'required',
            ],
            [
                'title.unique' => 'Đã có tên danh mục, xin điền tên khác',
                'title.required' => 'Phải có tên danh mục',
                'description.required' => 'Phải có mô tả',
                'content.required' => 'Phải có content',
            ]
        );

        $blog = new Blogs();
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->status = $data['status'];
        $blog->content = $data['content'];

        //them anh vao folder
        $get_image = $request->image;
        $path = 'uploads/blog/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $blog->image = $new_image;
        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Thêm blog thành công!');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blog = Blogs::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'description' => 'required|max:255',
                'status' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Phải có tên danh mục',
                'description.required' => 'Phải có mô tả',
                'status.required' => 'Phải có status',
                'content.required' => 'Phải có content',
            ]
        );

        $blog = Blogs::find($id);
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->status = $data['status'];
        $blog->content = $data['content'];

        //them anh vao folder
        $get_image = $request->image;
        //bo hinh anh
        if ($get_image) {
            $path_unlink = 'uploads/blog/' . $blog->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            //them moi
            $path = 'uploads/blog/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $blog->image = $new_image;
        }

        $blog->save();
        return redirect()->route('blog.index')->with('status', 'Cập nhật blog thành công!');
    }

    public function destroy($id)
    {
        $blog = Blogs::find($id);
        //bo hinh anh
        $path_unlink = 'uploads/blog/' . $blog->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $blog->delete();
        return redirect()->back();
    }
}
