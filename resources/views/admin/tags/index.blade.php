@extends('admin.layouts.blog')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Теги</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Теги</li>
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
                    <div class="col-3">
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-primary mb-3">
                            Добавить тег
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->id }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.tag.show', $tag->id) }}">
                                                    <i class="fas fa-regular fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.tag.edit', $tag->id) }}"
                                                   class="text-success">
                                                    <i class="fas fa-solid fa-pen"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.tag.delete', $tag->id) }}"
                                                      method="POST" class="w-auto">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent">
                                                        <i class="fas fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
