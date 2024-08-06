@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box align-items-center">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item text-danger">Danh sách</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h3>Danh sách danh mục</h3>
                    </div>
                    <div>
                        <a class="btn btn-success" href="{{ route('admin.catalogues.create') }}">Thêm mới</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Cover</th>
                                <th>Is Active</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <th>{{ $key + 1 }}</th>
                                    <th>{{ $item->name }}</th>
                                    <th><img src="{{ Storage::url($item->cover) }}" alt="" width="50px"></th>
                                    <th class="{{ $item->is_active == 1 ? 'text-success' : 'text-danger' }}">
                                        {{ $item->is_active == 1 ? 'Hiển thị' : 'Ẩn' }}</th>
                                    <th>{{ $item->created_at }}</th>
                                    <th>{{ $item->updated_at }}</th>
                                    <th>
                                        <a href="{{ route('admin.catalogues.show', $item->id) }}"
                                            class="btn btn-info">Xem</a>
                                        <a href="{{ route('admin.catalogues.edit', $item->id) }}"
                                            class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('admin.catalogues.destroy', $item->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn xóa không ?')">Xóa</a>
                                        {{-- <form action="{{ route('admin.catalogues.destroy', $item->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Bạn có chắc chắn xóa không ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 btn btn-danger">Xóa</button>
                                        </form> --}}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

@section('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example", {
            order: [0, 'desc']
        });
    </script>
@endsection
