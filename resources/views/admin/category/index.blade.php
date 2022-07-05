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
                    Liệt kê danh mục game
                </div>
                <div class="card-body">
                    <a href="{{ route('category.create') }}" style="" class="btn btn-success">Thêm danh mục game</a>

                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Slug</th>
                                <th>Mô Tả</th>
                                <th>Hình Ảnh</th>
                                <th>Hiển Thị</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $cate)
                                <tr>
                                    <td>{{ $cate->id }}</td>
                                    <td>{{ $cate->title }}</td>
                                    <td>{{ $cate->slug }}</td>
                                    <td>{{ $cate->description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/category/' . $cate->image) }}" height="150px"
                                            weight="150px">
                                    </td>
                                    <td>
                                        @if ($cate->status == 0)
                                            <img src="{{ asset('frontend/img/dislike.png') }}" alt="dislike"
                                                height="50px" weight="50px">
                                        @else
                                            <img src="{{ asset('frontend/img/like.png') }}" alt="like" height="50px"
                                                weight="50px">
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy', [$cate->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa danh mục game này không ?');"
                                                class="btn btn-danger">
                                                Xóa
                                            </button>
                                        </form>
                                        <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $category->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
@endsection
