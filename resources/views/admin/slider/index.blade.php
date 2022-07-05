@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
        <br>
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Liệt kê Slider
                </div>
                <div class="card-body">
                    <a href="{{ route('slider.create') }}" style="" class="btn btn-success">Thêm Slider</a>

                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mô Tả</th>
                                <th>Tên Slider</th>
                                <th>Slug</th>
                                <th>Hình Ảnh</th>
                                <th>Hiển Thị</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $key => $sli)
                                <tr>
                                    <td>{{ $sli->id }}</td>
                                    <td>{{ $sli->description }}</td>
                                    <td>{{ $sli->title }}</td>
                                    <td>{{ $sli->slug }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/slider/' . $sli->image) }}" height="150px"
                                            weight="150px">
                                    </td>
                                    <td>
                                        @if ($sli->status == 0)
                                            <img src="{{ asset('frontend/img/dislike.png') }}" alt="dislike"
                                                height="50px" weight="50px">
                                        @else
                                            <img src="{{ asset('frontend/img/like.png') }}" alt="like" height="50px"
                                                weight="50px">
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('slider.destroy', [$sli->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa danh mục game này không ?');"
                                                class="btn btn-danger">
                                                Xóa
                                            </button>
                                        </form>
                                        <a href="{{ route('slider.edit', $sli->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $slider->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
@endsection
