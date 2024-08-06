@extends('admin.layouts.master')

@section('title')
    Chi tiết tài khoản:
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box align-items-center">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tài khoản</a></li>
                        <li class="breadcrumb-item">Chi tiết</li>
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
                            <h3>Chi tiết tài khoản: <span class="text-danger ms-3">{{ $data->name }}</span></h3>
                        </div>
                        <a href="{{ route('admin.users.index') }}"><i
                                class="btn btn-success my-2 ri-arrow-go-back-fill"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>{{ $data->id }}</td>
                                    <td><img src="{{ Storage::url($data->avatar) }}" alt="" width="50px"></td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->type }}</td>
                                    <th class="{{ $data->status == 1 ? 'text-success' : 'text-danger' }}">
                                        {{ $data->status == 1 ? 'Hiển thị' : 'Ẩn' }}</th>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                </tr>
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
