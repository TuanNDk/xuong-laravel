@extends('client.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    {{-- <section class="shop-details mb-5"> --}}
    <div class="container-fluid">
        <div class="row product__details__pic">
            <div class="col-md-12">
                <div class="product__details__breadcrumb text-center">
                    <a href="./index.html">Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Product Details</span>
                </div>
                <hr>
            </div>
            <div class="col-md-6 border-right">
                <div class="row">
                    <div class="col-md-12">
                        {{-- Hình ảnh sản phẩm --}}
                        <div class="col-md-12 text-center">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <img src="{{ Storage::url($product->img_thumbnail) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row product__details__text">
                    <div class="col-md-12 text-black">
                        <h4>{{ $product->name }}</h4>
                    </div>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <span> - {{ $product->views }} Reviews</span>
                    </div>
                    <div class="">
                        <h4 class="text-danger">{{ number_format($product->price_sale, 0, ',', '.') }} VNĐ <span
                                class="text-decoration-line-through fs-5 ms-3 text-black-50">{{ number_format($product->price_regular, 0, ',', '.') }}
                                VNĐ</span></h4>
                    </div>
                    <p>{!! $product->description !!}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        {{-- Biến thể --}}
                        <div class="row product__details__option">
                            <div class="col-md-12 product__details__option__size d-flex border-0 mb-2">
                                <label class="me-4"><b>Size:</b></label>
                                @foreach ($sizes as $id => $name)
                                    <input type="radio" class="" id="radio_size_{{ $id }}"
                                        name="product_size_id" value="{{ $id }}" required>
                                    <label class="" for="radio_size_{{ $id }}">{{ $name }}</label>
                                @endforeach
                            </div>

                            <div class="col-md-12 product__details__option__size d-flex border-0 mb-2">
                                <label class=""><b>Color:</b></label>
                                @foreach ($colors as $id => $name)
                                    <input type="radio" class="" id="radio_color_{{ $id }}"
                                        name="product_color_id" value="{{ $id }}" required>
                                    <label class=""
                                        for="radio_color_{{ $id }}">{{ $name }}</label>
                                @endforeach
                            </div>

                            {{-- Số lượng --}}
                            <div class="col-md-12 product__details__cart__option d-flex ms-3">
                                <label for="quantity" class="mt-2 me-3 fw-bold"><b>QUANTITY:</b></label>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        {{-- <input type="number" value="1" min="1" id="quantity" name="quantity"
                                            required> --}}
                                        <input type="number" class="form-control" min="1" required value="1"
                                            id="quatity" placeholder="Enter quantity" name="quatity">
                                    </div>
                                    {{-- <input type="number" class="form-control" min="1" required value="1"
                                    id="quantity" placeholder="Enter quantity" name="quantity"> --}}
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add to cart</button>
                    </form>
                    {{-- <div class="product__details__btns__option">
                                    <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                    <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                                </div> --}}
                    <div class="product__details__last__option">
                        {{-- <h5><span>Guaranteed Safe Checkout</span></h5> --}}
                        <img src="img/shop-details/details-payment.png" alt="">
                        <ul>
                            <li><span>SKU:</span> {{ $product->sku }}</li>
                            <li><span>Categories:</span> {{ $product->catelogue->name }}</li>
                            <li><span>Tag:</span>
                                @foreach ($product->tags as $tag)
                                    <span class="text-black">{{ $tag->name }}</span>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row product__details__content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                        role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                        Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                        information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        {!! $product->content !!}
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                                a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                                $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                                worn all year round.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                            pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                                a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                                $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                                worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- </section> --}}
@endsection
