<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $slider = Slider::orderBy('id', 'DESC')->paginate(5);
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|
                        unique:categories|
                        max:255',
                'slug' => 'required|
                        unique:categories|
                        max:255',
                'description' => 'required|
                            max:255',
                'image' => 'required|
                        image|
                        mimes:jpg,png,jpeg,gif,svg',
                'status' => 'required',
            ],
            [
                'title.unique' => 'Đã có tên slider, xin điền tên khác',
                'title.required' => 'Phải có tên slider',
                'slug.unique' => 'Slug đã có, xin điền tên khác',
                'slug.required' => 'Phải có tên slug',
                'description.required' => 'Phải có mô tả',
                'image.required' => 'Phải có hình ảnh',
            ]
        );

        $slider = new Slider();
        $slider->title = $data['title'];
        $slider->slug = $data['slug'];
        $slider->description = $data['description'];
        $slider->status = $data['status'];

        //them anh vao folder
        $get_image = $request->image;
        $path = 'uploads/slider/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $slider->image = $new_image;
        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Thêm slider thành công!');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'slug' => 'required',
                'description' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Phải có tên slider',
                'slug.required' => 'Phải có tên slug',
                'description.required' => 'Phải có mô tả',
            ]
        );

        $slider = Slider::find($id);
        $slider->title = $data['title'];
        $slider->slug = $data['slug'];
        $slider->description = $data['description'];
        $slider->status = $data['status'];

        //them anh vao folder
        $get_image = $request->image;
        //bo hinh anh
        if ($get_image) {
            $path_unlink = 'uploads/slider/' . $slider->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            //them moi
            $path = 'uploads/slider/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $slider->image = $new_image;
        }

        $slider->save();
        return redirect()->route('slider.index')->with('status', 'Cập nhật danh mục thành công!');

    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        //bo hinh anh
        $path_unlink = 'uploads/slider/' . $slider->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $slider->delete();
        return redirect()->back();
    }
}
