@extends('admin._layouts.index')

@push('cssScript')
@include('admin._layouts._css-table')
@endpush

@push($title)
active
@endpush

@section('content')
<div class="page-body">
        <div class="container-fluid">
                <div class="page-title">
                        <div class="row">
                                <div class="col-6">
                                        <h3>{{ Helper::head($title) }}</h3>
                                </div>
                                <div class="col-6">
                                        <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                                                <li class="breadcrumb-item">{{ Helper::head($title) }}</li>
                                                <li class="breadcrumb-item active">Data</li>
                                        </ol>
                                </div>
                        </div>
                </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
                <div class="row project-cards">
                        <div class="col-md-12 project-list">
                                <div class="card">
                                        <div class="row">
                                                <div class="col-md-6 p-0 d-flex">
                                                        <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                                                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="projects.html#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>All</a></li>
                                                                <!-- <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="projects.html#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Doing</a></li>
                                                                <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="projects.html#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Done</a></li> -->
                                                        </ul>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                        <div class="form-group mb-0 me-0"></div>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <!-- State saving Starts-->
                        <div class="col-sm-12">
                                <div class="card">
                                        <div class="card-header pb-0 row align-content-between">
                                                <div class="col-10">
                                                        <h3>Kelompok Berdasarkan Komoditas</h3><span></span>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                        <table class="table table-bordernone">
                                                                <thead>
                                                                        <tr>
                                                                                <th>No</th>
                                                                                <th>Komoditas</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                                <th>Jumlah Data</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody class="datatabels">
                                                                </tbody>
                                                                <tfoot>
                                                                        <tr>
                                                                                <th>No</th>
                                                                                <th>Komoditas</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                                <th>Jumlah Data</th>
                                                                        </tr>
                                                                </tfoot>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- State saving Ends-->

                        <!-- State saving Starts-->
                        <div class="col-sm-12">
                                <div class="card">
                                        <div class="card-header pb-0 row align-content-between">
                                                <div class="col-10">
                                                        <h3>Hitung Probabilitas dan Mean</h3><span></span>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                        <table class="table table-bordernone">
                                                                <thead>
                                                                        <tr>
                                                                                <th>No</th>
                                                                                <th>Komoditas</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                                <th>Probabilitas</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody class="datatabels1">
                                                                </tbody>
                                                                <tfoot>
                                                                        <tr>
                                                                                <th>No</th>
                                                                                <th>Komoditas</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                                <th>Probabilitas</th>
                                                                        </tr>
                                                                </tfoot>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- State saving Ends-->

                        <!-- State saving Starts-->
                        <div class="col-sm-12">
                                <div class="card">
                                        <div class="card-header pb-0 row align-content-between">
                                                <div class="col-10">
                                                        <h3>Kelompok Berdasarkan Komoditas</h3><span></span>
                                                </div>
                                                <div class="col-2">
                                                        <select class="form-select" name="jumlah" id="jumlah">
                                                                <option selected="selected">5</option>
                                                                <option>10</option>
                                                                <option>15</option>
                                                                <option>25</option>
                                                                <option>50</option>
                                                                <option>100</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                        <table class="table table-bordernone">
                                                                <thead>
                                                                        <tr>
                                                                                <th>Data Latih Ke-</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody class="datatabels2">
                                                                </tbody>
                                                                <tfoot>
                                                                        <tr>
                                                                                <th>Data Latih Ke-</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                        </tr>
                                                                </tfoot>
                                                        </table>
                                                </div>
                                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                                        <div class="text-center">
                                                                <div id="contentx"></div>
                                                        </div>
                                                        <div class="text-center">
                                                                <ul class="pagination twbs-pagination pagination-primary">
                                                                </ul>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- State saving Ends-->

                        <!-- State saving Starts-->
                        <div class="col-sm-12">
                                <div class="card">
                                        <div class="card-header pb-0 row align-content-between">
                                                <div class="col-10">
                                                        <h3>Hasil Hitung Standar Deviasi</h3><span></span>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive datatabels3">
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- State saving Ends-->

                        <!-- State saving Starts-->
                        <div class="col-sm-12">
                                <div class="card">
                                        <div class="card-header pb-0 row align-content-between">
                                                <div class="col-10">
                                                        <h3>Kelompok Berdasarkan Komoditas</h3><span></span>
                                                </div>
                                                <div class="col-2">
                                                        <select class="form-select" name="jumlah2" id="jumlah2">
                                                                <option selected="selected">5</option>
                                                                <option>10</option>
                                                                <option>15</option>
                                                                <option>25</option>
                                                                <option>50</option>
                                                                <option>100</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                        <table class="table table-bordernone">
                                                                <thead>
                                                                        <tr>
                                                                                <th>Data Latih Ke-</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                                <th>Komoditas Awal</th>
                                                                                <th>Komoditas Akhir</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody class="datatabels4">
                                                                </tbody>
                                                                <tfoot>
                                                                        <tr>
                                                                                <th>Data Latih Ke-</th>
                                                                                <th>Cuaca</th>
                                                                                <th>Luas Lahan</th>
                                                                                <th>Pupuk Urea</th>
                                                                                <th>Pupuk NPK</th>
                                                                                <th>Komoditas Awal</th>
                                                                                <th>Komoditas Akhir</th>
                                                                        </tr>
                                                                </tfoot>
                                                        </table>
                                                </div>
                                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                                        <div class="text-center">
                                                                <div id="contentx2"></div>
                                                        </div>
                                                        <div class="text-center">
                                                                <ul class="pagination twbs-pagination2 pagination-primary">
                                                                </ul>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- State saving Ends-->

                        <!-- State saving Starts-->
                        <div class="col-sm-12">
                                <div class="card">
                                        <div class="card-header pb-0 row align-content-between">
                                                <div class="col-10">
                                                        <h3>Akurasi</h3><span></span>
                                                </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive datatabels5">
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <!-- State saving Ends-->
                </div>
        </div>
        <!-- Container-fluid Ends-->
</div>

@endsection

@push('jsScript')
@include('admin._layouts._js-table')

<script type="text/javascript">
        $(document).ready(function() {
                let urlx = "{{ $title }}";

                loadpage(5, 5);

                var $pagination = $('.twbs-pagination');
                var $pagination2 = $('.twbs-pagination2');
                var defaultOpts = {
                        totalPages: 1,
                        prev: '&#8672;',
                        next: '&#8674;',
                        first: '&#8676;',
                        last: '&#8677;',
                };
                $pagination.twbsPagination(defaultOpts);
                $pagination2.twbsPagination(defaultOpts);

                function loaddata(page, jml, page2, jml2) {
                        $.ajax({
                                url: urlx + '/data',
                                data: {
                                        "page": page,
                                        "jml": jml,
                                        "page2": page2,
                                        "jml2": jml2
                                },
                                type: "GET",
                                datatype: "json",
                                success: function(data) {
                                        $(".datatabels").html(data.html_1);
                                        $(".datatabels1").html(data.html_2);
                                        $(".datatabels2").html(data.html_3);
                                        $(".datatabels3").html(data.html_4);
                                        $(".datatabels4").html(data.html_5);
                                        $(".datatabels5").html(data.html_6);
                                }
                        });
                }

                function loadpage(jml, jml2) {
                        $.ajax({
                                url: urlx + '/data',
                                data: {
                                        "jml": jml,
                                        "jml2": jml2
                                },
                                type: "GET",
                                datatype: "json",
                                success: function(response) {
                                        console.log(response);
                                        if ($pagination.data("twbs-pagination")) {
                                                $pagination.twbsPagination('destroy');
                                        }
                                        if ($pagination2.data("twbs-pagination")) {
                                                $pagination2.twbsPagination('destroy');
                                        }

                                        $pagination.twbsPagination($.extend({}, defaultOpts, {
                                                startPage: 1,
                                                totalPages: response.total_page_1,
                                                visiblePages: 4,
                                                prev: '&#8672;',
                                                next: '&#8674;',
                                                first: '&#8676;',
                                                last: '&#8677;',
                                                onPageClick: function(event, page) {
                                                        if (page == 1) {
                                                                var to = 1;
                                                        } else {
                                                                var to = page * jml - (jml - 1);
                                                        }
                                                        if (page == response.total_page_1) {
                                                                var end = response.total_data_1;
                                                        } else {
                                                                var end = page * jml;
                                                        }
                                                        $('#contentx').text('Showing ' + to + ' to ' + end + ' of ' + response.total_data_1 + ' entries');
                                                        loaddata(page, jml, 1, 5);
                                                }

                                        }));

                                        $pagination2.twbsPagination($.extend({}, defaultOpts, {
                                                startPage: 1,
                                                totalPages: response.total_page_2,
                                                visiblePages: 4,
                                                prev: '&#8672;',
                                                next: '&#8674;',
                                                first: '&#8676;',
                                                last: '&#8677;',
                                                onPageClick: function(event, page) {
                                                        if (page == 1) {
                                                                var to = 1;
                                                        } else {
                                                                var to = page * jml2 - (jml2 - 1);
                                                        }
                                                        if (page == response.total_page_2) {
                                                                var end = response.total_data_2;
                                                        } else {
                                                                var end = page * jml2;
                                                        }
                                                        $('#contentx2').text('Showing ' + to + ' to ' + end + ' of ' + response.total_data_2 + ' entries');
                                                        loaddata(1, 5, page, jml2);
                                                }

                                        }));
                                }
                        });
                }

                $("#jumlah, #jumlah2").on('keyup change', function(event) {
                        let jml = $('#jumlah').val();
                        let jml2 = $('#jumlah2').val();
                        loadpage(jml, jml2);
                });

                // Notify
                var content = {
                        message: 'Memproses data...'
                };
                var setting = {
                        type: 'primary',
                        allow_dismiss: true,
                        newest_on_top: false,
                        mouse_over: false,
                        showProgressbar: true,
                        spacing: 10,
                        timer: 1000,
                        placement: {
                                from: 'top',
                                align: 'right'
                        },
                        offset: {
                                x: 30,
                                y: 30
                        },
                        delay: 1000,
                        z_index: 10000,
                        animate: {
                                enter: 'animated bounceIn',
                                exit: 'animated bounceOut'
                        }
                }
                var notify = $.notify(content, setting);

                // Notify Success
                function notifySuccess() {
                        notify = $.notify(content, setting);
                        setTimeout(function() {
                                notify.update('message', '<strong>Saving</strong> Data.');
                                notify.update('type', 'primary');
                                notify.update('progress', 50);
                        }, 1000);
                        setTimeout(function() {
                                notify.update('message', '<strong>Checking</strong> for errors.');
                                notify.update('type', 'success');
                                notify.update('progress', 100);
                        }, 2000);
                }

                // Notify Error
                function notifyError() {
                        notify = $.notify(content, setting);
                        setTimeout(function() {
                                notify.update('message', '<strong>Failet Saving</strong> Data.');
                                notify.update('type', 'danger');
                                notify.update('progress', 100);
                        }, 1000);
                }
        });
</script>
@endpush