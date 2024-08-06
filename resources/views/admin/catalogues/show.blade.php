@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục: <span class="text-danger">{{ $model->name }}</span>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box align-items-center">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item text-danger">Chi tiết</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="col-md my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-0">
                            <h4>Chi tiết danh mục: <span class="text-danger ms-3 fs-3">{{ $model->name }}</span></h4>
                        </div>
                        <a href="{{ route('admin.catalogues.index') }}"><i
                            class="btn btn-success ri-arrow-go-back-fill"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Trường</th>
                                    <th>Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model->toArray() as $key => $item)
                                    <tr class="align-middle">
                                        <td>{{ $key }}</td>
                                        <td>
                                            @php
                                                if ($key == 'cover') {
                                                    $url = Storage::url($item);
                                                    echo "<img src='$url' alt='' width='100px'>";
                                                } elseif (Str::contains($key, 'is_')) {
                                                    echo $item
                                                        ? '<span class="text-success"> Hiển thị </span>'
                                                        : '<span class="text-danger"> Ẩn </span>';
                                                } else {
                                                    echo $item;
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
@endsection
