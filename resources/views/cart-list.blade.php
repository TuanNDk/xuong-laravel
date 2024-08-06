@extends('client.layouts.master')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table class="table table-bordered">
                            <thead>
                                <tr class=" text-center">
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th style="width:250px;">Total</th>
                                    <th style="width:50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session()->has('cart'))
                                    @foreach (session('cart') as $item)
                                        {{-- @php
                                            dd(session('cart'));
                                        @endphp --}}
                                        <tr class="align-middle">
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ Storage::url($item['img_thumbnail']) }}" alt=""
                                                        width="80px">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h5>{{ $item['name'] }}</h5>
                                                    <h6 class="text-danger">
                                                        {{ number_format($item['price_sale'], 0, ',', '.') }} VNĐ <span
                                                            class="text-decoration-line-through fs-6 ms-3 text-black-50">{{ number_format($item['price_regular'], 0, ',', '.') }}
                                                            VNĐ</span></h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">{{ $item['color']['name'] }}</td>
                                            <td class="align-middle text-center">{{ $item['size']['name'] }}</td>
                                            <td class="quantity__item align-middle text-center">
                                                <div class="quantity text-center">
                                                    <div class="pro-qty-2 text-center">
                                                        <input class="text-center" type="number"
                                                            value="{{ $item['quatity'] }}" min="1" id="quatity"
                                                            name="quatity" required>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price align-middle text-center">
                                                {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</td>
                                            <td class="cart__close align-middle"><i class="fa fa-close"></i></td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code" value="coupon">
                            <button type="submit">Apply</button>
                        </form>
                    </div>

                    <div class="cart__total mb-5">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</td></span></li>
                            <li>Total <span>{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</td></span></li>
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <h3>Địa chỉ liên hệ</h3>
                        <form action="{{ route('order.save') }}" method="POST">
                            @csrf
                            <div class="mt-3 mb-2">
                                <label for="user_name"> {{ \Str::convertCase('user_name', MB_CASE_TITLE) }}</label>
                                <input class="form-control" type="text" name="user_name" id="user_name"
                                    value="{{ auth()->user()?->name }}">
                            </div>
                            <div class="mt-3 mb-2">
                                <label for="user_email"> {{ \Str::convertCase('user_email', MB_CASE_TITLE) }}</label>
                                <input class="form-control" type="text" name="user_email" id="user_email"
                                    value="{{ auth()->user()?->emai }}">
                            </div>
                            <div class="mt-3 mb-2">
                                <label for="user_phone"> {{ \Str::convertCase('user_phone', MB_CASE_TITLE) }}</label>
                                <input class="form-control" type="text" name="user_phone" id="user_phone">
                            </div>
                            <div class="mt-3 mb-2">
                                <label for="user_address"> {{ \Str::convertCase('user_address', MB_CASE_TITLE) }}</label>
                                <input class="form-control" type="text" name="user_address" id="user_address">
                            </div>
                            <div class="mt-3 mb-2">
                                <label for="user_note"> {{ \Str::convertCase('user_note', MB_CASE_TITLE) }}</label>
                                <input class="form-control" type="text" name="user_note" id="user_note">
                            </div>
                            <button class="btn primary-btn mt-2" type="submit">Đặt hàng</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
