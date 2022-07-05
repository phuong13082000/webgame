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
                    Liệt kê blog
                </div>
                <div class="card-body">
                    <a href="{{ route('blog.create') }}" style="" class="btn btn-success">Thêm blog</a>

                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Blog</th>
                                <th>Mô Tả</th>
                                <th>Nội Dung</th>
                                <th>Hình Ảnh</th>
                                <th>Hiển Thị</th>
                                <th>Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $key => $bl)
                                <tr>
                                    <td>{{ $bl->id }}</td>
                                    <td>{{ $bl->title }}</td>
                                    <td>{{ $bl->description }}</td>
                                    <td>{{ $bl->content }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/blog/' . $bl->image) }}" height="150px"
                                            weight="150px">
                                    </td>
                                    <td>
                                        @if ($bl->status == 0)
                                            <img src="{{ asset('frontend/img/dislike.png') }}" alt="dislike"
                                                height="50px" weight="50px">
                                        @else
                                            <img src="{{ asset('frontend/img/like.png') }}" alt="like" height="50px"
                                                weight="50px">
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('blog.destroy', [$bl->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn muốn xóa blog này không ?');"
                                                class="btn btn-danger">
                                                Xóa
                                            </button>
                                        </form>
                                        <a href="{{ route('blog.edit', $bl->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blog->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
@endsection
