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
                    Cập nhật danh mục game
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

                    <a href="{{ route('category.index') }}" style="" class="btn btn-success">Liệt kê danh mục game</a>
                    <a href="{{ route('category.create') }}" style="" class="btn btn-success">Thêm danh mục game</a>

                    <form action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" value="{{ $category->title }}" name="title">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="convert_slug" value="{{ $category->slug }}" name="slug">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{ asset('uploads/category/' . $category->image) }}" height="150px" weight="150px">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="description">{{ $category->description }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" id="">
                                @if ($category->status == 1)
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
