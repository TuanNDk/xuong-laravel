@extends('admin.layouts.master')

@section('title')
    Thêm mới danh mục
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box align-items-center">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item text-danger">Thêm mới</li>
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

                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h3>Thêm mới danh mục</h3>
                        </div>
                    </div>


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

                    <div class="card-body">
                        <form action="{{ route('admin.catalogues.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name: </label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is_invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Tên danh mục ">
                                        @error('name')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="is_active" class="form-label">Status: </label>
                                        <div class="col-sm-10 d-flex gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_active"
                                                    id="gridRadios1" value="1" checked>
                                                <label class="form-check-label text-success" for="gridRadios1">
                                                    Hiển thị
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_active"
                                                    id="gridRadios2" value="0">
                                                <label class="form-check-label text-danger" for="gridRadios2">
                                                    Ẩn
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="cover" class="form-label">Cover: </label>
                                        <input type="file" id="cover" name="cover" class="form-control"
                                            onchange="showImage(event)">
                                        <img id="img_danh_muc" src="" alt="Hình ảnh sản phẩm"
                                            style="width: 80px; display:none">
                                    </div>
                                </div>

                                <div class="d-flex ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('admin.catalogues.index') }}" class="btn btn-success ms-3">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
