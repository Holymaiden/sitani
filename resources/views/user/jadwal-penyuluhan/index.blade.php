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
                                                <h1 class="breadcrumb__content--title text-white mb-25">Jadwal Penyuluhan</h1>
                                                <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                                        <li class="breadcrumb__content--menu__items"><span class="text-white">Jadwal Penyuluhan</span></li>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
                <div class="container-fluid">
                        <div class="cart__section--inner">
                                <form action="#">
                                        <h2 class="cart__title mb-40">Jadwal Penyuluhan</h2>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <div class="cart__table">
                                                                <table class="cart__table--inner">
                                                                        <thead class="cart__table--header">
                                                                                <tr class="cart__table--header__items">
                                                                                        <th class="cart__table--header__list">Tanggal</th>
                                                                                        <th class="cart__table--header__list">Waktu</th>
                                                                                        <th class="cart__table--header__list">Tempat</th>
                                                                                        <th class="cart__table--header__list">Penyuluh</th>
                                                                                        <th class="cart__table--header__list">Keterangan</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody class="cart__table--body">
                                                                                @foreach($jadwal as $i => $v)
                                                                                <tr class="cart__table--body__items">
                                                                                        <td class="cart__table--body__list">
                                                                                                <h3 class="cart__content--title h4">{{ date('d M Y',strtotime($v->tanggal)) }}</h3>
                                                                                        </td>
                                                                                        <td class="cart__table--body__list">
                                                                                                <span class="cart__price">{{ $v->waktu }}</span>
                                                                                        </td>
                                                                                        <td class="cart__table--body__list">
                                                                                                <h3 class="cart__content--title h4">{{ $v->tempat }}</h3>
                                                                                        </td>
                                                                                        <td class="cart__table--body__list">
                                                                                                <span class="cart__price end">{{ $v->penyuluh->nama }}</span>
                                                                                        </td>
                                                                                        <td class="cart__table--body__list">
                                                                                                <h3 class="cart__content--title h5">{{ $v->keterangan }}</h3>
                                                                                        </td>
                                                                                </tr>
                                                                                @endforeach
                                                                        </tbody>
                                                                </table>

                                                                <div class="continue__shopping d-flex justify-content-center">
                                                                        {{ $jadwal->links() }}
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                </form>
                        </div>
                </div>
        </section>
        <!-- cart section end -->

</main>
@endsection

@push('jsScript')
@include('user._layouts._js')
@endpush