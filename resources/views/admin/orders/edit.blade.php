@extends('admin.layouts.master')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box align-items-center">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Đơn hàng</a></li>
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

                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h3>Chi tiết đơn hàng</h3>
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
                        <form action="{{ route('admin.orders.update', $data) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name: </label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is_invalid @enderror"
                                            value="{{ $data->user_name }}" disabled>
                                        @error('name')
                                            <p class="text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_price" class="form-label">Tổng đơn hàng: </label>
                                        <input type="number" id="total_price" name="total_price"
                                            class="form-control @error('total_price') is_invalid @enderror"
                                            value="{{ $data->total_price }}" disabled>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="status_order" class="form-label">Trạng thái đơn hàng: </label>
                                        <select id="status_order" name="status_order" class="form-control">
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status_payment" class="form-label">Trạng thái thanh toán: </label>
                                        <select id="status_payment" name="status_payment" class="form-control">
                                            <option value="chưa thanh toán">Chưa thanh toán</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex ">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <a href="{{ route('admin.orders.index') }}"><i
                                            class="btn btn-success ri-arrow-go-back-fill"></i></a>
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
