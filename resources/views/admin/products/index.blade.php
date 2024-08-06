@extends('admin.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box  align-items-center">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item text-danger">Danh sách</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @if ($errors->any() || session('error'))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        @if ($errors->any())
                            <div class="alert alert-danger" style="width: 100%;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" style="width: 100%;">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Hiển thị thông báo thành công --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close">
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0 align-content-center">
                        <h3>Danh sách sản phẩm</h3>
                    </div>
                    <div>
                        <a href="{{ route('admin.products.create') }}"><i class="btn btn-success ri-add-fill"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered nowrap dt-responsive  table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>img_thumbnail</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Catelogues</th>
                                <th>Price Regular</th>
                                <th>Price Sale</th>
                                <th>Views</th>
                                <th>Is Active</th>
                                <th>Is Hot Deal</th>
                                <th>Is Good Deal</th>
                                <th>Is New</th>
                                <th>Is Show Home</th>
                                <th>Tag</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="align-middle">
                                    <th>{{ $item->id }}</th>
                                    <td> <img src="{{ Storage::url($item->img_thumbnail) }}" alt="" width="50px">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>
                                        {{ $item->catelogue->name }}
                                    </td>
                                    <td class="text-success">{{ number_format($item->price_regular, 0, ',', '.') }}</td>
                                    <td class="text-danger">{{ number_format($item->price_sale, 0, ',', '.') }}</td>
                                    <td>{{ $item->views }}</td>
                                    <td>{!! $item->is_active ? '<span class="text-success">Hiển thị</span>' : '<span class="text-danger">Ẩn</span>' !!}
                                    </td>
                                    <td>{!! $item->is_hot_deal ? '<span class="text-success">Hiển thị</span>' : '<span class="text-danger">Ẩn</span>' !!}</td>
                                    <td>{!! $item->is_good_deal ? '<span class="text-success">Hiển thị</span>' : '<span class="text-danger">Ẩn</span>' !!}</td>
                                    <td>{!! $item->is_new ? '<span class="text-success">Hiển thị</span>' : '<span class="text-danger">Ẩn</span>' !!}</td>
                                    <td>{!! $item->is_show_home ? '<span class="text-success">Hiển thị</span>' : '<span class="text-danger">Ẩn</span>' !!}</td>
                                    <td>
                                        @foreach ($item->tags as $tag)
                                            <span class="badge bg-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="d-flex mt-2 align-item-center">
                                            <a href="{{ route('admin.products.edit', $item) }}" type="submit"
                                                class="btn btn-warning me-2">Sửa</a>

                                            <form action="{{ route('admin.products.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>

                                            </form>
                                        </div>
                                    </td>
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
