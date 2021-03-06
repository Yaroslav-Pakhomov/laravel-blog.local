@extends('admin.layouts.blog')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование тега</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
                            <li class="breadcrumb-item active">Редактирование тега</li>
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

                    <div class="col-12">
                        <form class="w-25" action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>
                                    <input class="form-control" type="text" name="title" placeholder="Введите название"
                                           value="{{ $tag->title }}">
                                </label>
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Обновить</button>
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
