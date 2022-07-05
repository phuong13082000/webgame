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
                    Cập nhật blog
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('blog.index') }}" style="" class="btn btn-success">Liệt kê blog</a>
                    <a href="{{ route('blog.create') }}" style="" class="btn btn-success">Thêm blog</a>

                    <form action="{{ route('blog.update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" value="{{ $blog->title }}" name="title">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{ asset('uploads/blog/' . $blog->image) }}" height="150px" weight="150px">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" id="desc_blog" name="description">{{ $blog->description }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <textarea class="form-control" id="content_blog" name="content">{{ $blog->content }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" id="">
                                @if ($blog->status == 1)
                                    <option value="1" selected>Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                @else
                                    <option value="1">Hiển Thị</option>
                                    <option value="0" selected>Không Hiển Thị</option>
                                @endif
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
