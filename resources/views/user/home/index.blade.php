@extends('user._layouts.index')

@push('cssScript')
@include('user._layouts._css')
@endpush

@section('content')
<main class="main__content_wrapper">
        <!-- Start slider section -->
        <section class="hero__slider--section">
                <div class="hero__slider--inner hero__slider--activation swiper">
                        <div class="hero__slider--wrapper swiper-wrapper">
                                <div class="swiper-slide ">
                                        <div class="hero__slider--items bg__gray--color">
                                                <div class="container slider__items--container">
                                                        <div class="hero__slider--items__inner">
                                                                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">
                                                                        <div class="col">
                                                                                <div class="slider__content slider__content--padding__left">
                                                                                        <h2 class="slider__content--maintitle h1">
                                                                                                <span class="text__secondary">Pertanian</span> <br>
                                                                                        </h2>
                                                                                        <p class="slider__content--desc">
                                                                                                Pertanian merupakan salah satu sektor yang sangat penting bagi kehidupan manusia. Pertanian merupakan sektor yang berperan dalam memenuhi kebutuhan pangan manusia. Selain itu, pertanian juga berperan dalam memenuhi kebutuhan pangan ternak.
                                                                                        </p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col">
                                                                                <div class="hero__slider--layer">
                                                                                        <img class="slider__layer--img " src="{{ url('grocee/img/tani/pertanian.jpg') }}" alt="slider-img">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="swiper-slide ">
                                        <div class="hero__slider--items bg__gray--color">
                                                <div class="container slider__items--container">
                                                        <div class="hero__slider--items__inner">
                                                                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">
                                                                        <div class="col">
                                                                                <div class="slider__content slider__content--padding__left">
                                                                                        <h2 class="slider__content--maintitle h1">
                                                                                                <span class="text__secondary">Padi dan Jagung</span> <br>
                                                                                        </h2>
                                                                                        <p class="slider__content--desc">
                                                                                                Padi dan jagung merupakan salah satu komoditas pangan yang sangat penting bagi kehidupan manusia. Padi dan jagung merupakan sumber karbohidrat yang sangat dibutuhkan oleh manusia. Selain itu, padi dan jagung juga merupakan bahan baku untuk pembuatan makanan lainnya seperti tepung, mi, dan lain-lain.
                                                                                        </p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col">
                                                                                <div class="hero__slider--layer home1__slider--layer2">
                                                                                        <img class="slider__layer--img  home1__slider--layer2__img" src="{{ url('grocee/img/tani/padi.jpg') }}" alt="slider-img">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="swiper-slide ">
                                        <div class="hero__slider--items bg__gray--color">
                                                <div class="container slider__items--container">
                                                        <div class="hero__slider--items__inner">
                                                                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">
                                                                        <div class="col">
                                                                                <div class="slider__content slider__content--padding__left">
                                                                                        <h2 class="slider__content--maintitle h1">
                                                                                                <span class="text__secondary">Cabe dan Sayuran</span> <br>
                                                                                        </h2>
                                                                                        <p class="slider__content--desc">
                                                                                                Cabe dan sayuran merupakan salah satu komoditas pangan yang sangat penting bagi kehidupan manusia. Cabe dan sayuran merupakan sumber vitamin yang sangat dibutuhkan oleh manusia. Selain itu, cabe dan sayuran juga merupakan bahan baku untuk pembuatan makanan lainnya seperti sambal, sayur lodeh, dan lain-lain.
                                                                                        </p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col">
                                                                                <div class="hero__slider--layer">
                                                                                        <img class="slider__layer--img " src="{{ url('grocee/img/tani/cabe.jpg') }}" alt="slider-img">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="slider__pagination swiper-pagination"></div>
                </div>
        </section>
        <!-- End slider section -->

        <!-- Start categories product section -->
        <section class="product__section product__categories--section section--padding">
                <div class="container">
                        <div class="section__heading text-center mb-40">
                                <h2 class="section__heading--maintitle">Kelompok Tani</h2>
                        </div>
                        <div class="product__section--inner product__swiper--activation swiper">
                                <div class="swiper-wrapper">

                                        @foreach($kelompok as $i => $kelompok)
                                        <div class="swiper-slide">
                                                <div class="product__items product__bg">
                                                        <div class="product__items--thumbnail">
                                                                <img class="product__items--img" src="{{ url('uploads/petani'). '/'.Helper::getImagePetani($i) }}" alt="categories-img">
                                                                <div class="product__categories--content d-flex justify-content-between align-items-center">
                                                                        <div class="product__categories--content__left">
                                                                                <h3 class="product__categories--content__maintitle">{{ $kelompok->nama }}</h3>
                                                                                <span class="product__categories--content__subtitle">{{ $kelompok->desa->nama }}</span>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        @endforeach
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                </div>
        </section>
        <!-- End categories product section -->

        <!-- Start blog section -->
        <section class="blog__section section--padding">
                <div class="container blog__section--container">
                        <div class="section__heading text-center mb-40">
                                <h2 class="section__heading--maintitle">Hasil Panen</h2>
                        </div>
                        <div class="blog__section--inner blog__swiper--activation swiper">
                                <div class="swiper-wrapper">

                                        @foreach($panen as $i => $panen)
                                        <div class="swiper-slide">
                                                <div class="blog__items">
                                                        <div class="blog__items--thumbnail">
                                                                <img class="blog__items--img" src="{{ url('uploads/panen/' . $panen->gambar) }}" alt="blog-img" style="width: -webkit-fill-available;">
                                                        </div>
                                                        <div class="blog__items--content">
                                                                <div class="blog__items--meta">
                                                                        <ul class="d-flex">
                                                                                <li class="blog__items--meta__list">
                                                                                        <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                                <path d="M74.705,129.154a6.088,6.088,0,0,0,1.085-5.056,6.167,6.167,0,0,0-2.539-3.839,6.608,6.608,0,0,0-4.958-1.207,6.475,6.475,0,0,0-4.356,2.53,6.056,6.056,0,0,0-1.174,5.154,14.881,14.881,0,0,1,.442,2.339,5.759,5.759,0,0,1-.494,2.849c-.065.136-.139.266-.213.4.029.012.043.022.055.02a6.859,6.859,0,0,0,3.154-1.268.223.223,0,0,1,.281-.043,6.72,6.72,0,0,0,4.658.7,6.475,6.475,0,0,0,4.058-2.585Zm2.717,4.572a2.756,2.756,0,0,1-.261-.425,4.205,4.205,0,0,1-.1-2.971,4.6,4.6,0,0,0-.139-3.087c-.113-.278-.267-.534-.427-.851-.031.134-.046.191-.057.25a6.593,6.593,0,0,1-.849,2.323,7.164,7.164,0,0,1-4.994,3.5c-.367.071-.741.095-1.119.142a.19.19,0,0,0,.036.055c.094.071.185.144.285.2a4.856,4.856,0,0,0,4.87.278.261.261,0,0,1,.23,0,4.912,4.912,0,0,0,1.725.752,2.973,2.973,0,0,0,.72.081C77.531,133.97,77.541,133.895,77.423,133.726Z" transform="translate(-62.5 -118.975)" fill="currentColor" />
                                                                                        </svg>
                                                                                        <span class="blog__items--meta__text">{{ $panen->jumlah_panen . ' ' .  $panen->satuan_panen}}</span>
                                                                                </li>
                                                                                <li class="blog__items--meta__list">
                                                                                        <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                                <path d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z" transform="translate(-64.2 -62.274)" fill="currentColor" />
                                                                                        </svg>
                                                                                        <span class="blog__items--meta__text">{{ date('d M Y',strtotime($panen->tanggal_panen)) }}</span>
                                                                                </li>
                                                                        </ul>
                                                                </div>
                                                                <h3 class="blog__items--title">{{ $panen->lahan->anggota->nama }}</h3>
                                                                <p class="blog__items--desc">{{ $panen->keterangan }}</p>
                                                        </div>
                                                </div>
                                        </div>
                                        @endforeach

                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                </div>
        </section>
        <!-- End blog section -->
</main>
@endsection

@push('jsScript')
@include('user._layouts._js')
@endpush