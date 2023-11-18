@extends('user._layouts.index')

@push('cssScript')
@include('user._layouts._css')
@endpush

@section('content')
<main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
                <div class="container">
                        <div class="row row-cols-1">
                                <div class="col">
                                        <div class="breadcrumb__content text-center">
                                                <h1 class="breadcrumb__content--title text-white mb-25">Bantuan</h1>
                                                <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                                        <li class="breadcrumb__content--menu__items"><span class="text-white">Bantuan</span></li>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start shop section -->
        <section class="shop__section section--padding">
                <div class="container">
                        <div class="row">
                                <div class="col-12">
                                        <div class="shop__product--wrapper">
                                                <div class="tab_content">
                                                        <div id="product_grid" class="tab_pane active show">
                                                                <div class="product__section--inner product__section--style3__inner">
                                                                        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 mb--n30">

                                                                                @foreach($bantuan as $i => $v)
                                                                                <div class="col mb-30">
                                                                                        <div class="product__items product__items2">
                                                                                                <div class="product__items--thumbnail">
                                                                                                        <img class="product__items--img product__primary--img" src="{{ url('uploads/bantuan/' . $v->gambar) }}" alt="product-img">
                                                                                                        <div class="product__badge">
                                                                                                                <span class="product__badge--items sale">Baru</span>
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="product__items--content product__items2--content text-center">
                                                                                                        <a class="add__to--cart__btn" href="cart.html">{{ $v->nama }}</a>
                                                                                                        <h3 class="product__items--content__title h4">{{ $v->nama }}</h3>
                                                                                                        <div class="product__items--price">
                                                                                                                <span class="current__price">{{ $v->keterangan }}</span>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                                @endforeach
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="pagination__area bg__gray--color">
                                                        <nav class="pagination justify-content-center">
                                                                {{ $bantuan->links() }}
                                                        </nav>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <!-- End shop section -->
</main>
@endsection

@push('jsScript')
@include('user._layouts._js')
@endpush