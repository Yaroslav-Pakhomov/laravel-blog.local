@extends('admin.layouts.blog')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админ</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">

                    <div class="col-12 w-25">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>
                                    <input class="form-control" type="text" name="title" placeholder="Введите название"
                                           value="{{ old('title') }}">
                                </label>
                                @error('title')
                                <div class="text-danger">
                                    Это поле необходимо заполнить.
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="summernote">Текст поста</label>
                                <textarea id="summernote" name="content">
                                    {{ old('title') }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">
                                    Это поле необходимо заполнить.
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Добавить превью</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label" >Выбрать изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50">
                                <label>Добавить главное изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label" >Выбрать изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection