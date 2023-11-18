@extends('admin._layouts.index')

@push('cssScript')
@include('admin._layouts._css-table')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/todo.css') }}">
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
                <div class="user-profile">
                        <div class="row">
                                <!-- user profile header start-->
                                <div class="col-sm-12">
                                        <div class="card profile-header"><img class="img-fluid bg-img-cover" src="{{ url('assets/images/user-profile/637819924bf73.jpeg') }}" alt="">
                                                <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{ url('assets/images/user-profile/637819924bf73.jpeg') }}" alt=""></div>
                                                <div class="userpro-box">
                                                        <div class="img-wrraper">
                                                                <div class="avatar"><img class="img-fluid" alt="" src="{{ url('grocee/img/logo/icon-logo.png') }}"></div>
                                                        </div>
                                                        <div class="user-designation">
                                                                <div class="title">
                                                                        <h4>Perhitungan</h4>
                                                                        <h6>naive bayes</h6>
                                                                </div>
                                                                <div class="follow">
                                                                        <ul class="follow-list">
                                                                                <li>
                                                                                        <div class="follow-num counter">{{ $totalData }}</div><span>Total Data</span>
                                                                                </li>
                                                                                <li>
                                                                                        <div class="follow-num counter">4</div><span>Kriteria</span>
                                                                                </li>
                                                                                <li>
                                                                                        <div class="follow-num counter">{{ number_format($akurasi['akurasi'],0) }}%</div><span>Akurasi</span>
                                                                                </li>
                                                                        </ul>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <!-- user profile header end-->
                        </div>
                </div>
                <div class="col-sm-12" id="alertHasil">
                        <div class="card">
                                <div class="card-body">
                                        <div class="alert alert-primary" role="alert">
                                                <h4 class="alert-heading">Selamat</h4>
                                                <p>Setelah melakukan perhitungan <code class="text-light">naive bayes</code> dengan data yang telah diinputkan, maka hasilnya adalah komoditas <code class="text-light" id="hasilKomoditas"></code>.</p>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-12 box-col-12">
                        <div class="card">
                                <div class="card-header pb-0">
                                        <h3>Menentukan Komoditas</h3>
                                        <span>Menu ini bertujuan untuk menentukan <code class="text-danger">komoditas</code> yang akan ditanam berdasarkan data yang telah diinputkan.</span>
                                </div>
                                <div class="card-body">
                                        <form class="needs-validation" novalidate="" id="formPenentuanKomoditas">
                                                @csrf
                                                <div class="row g-3">
                                                        <div class="col-md-6">
                                                                <label class="form-label" for="form-cuaca">Cuaca (Saat Ini)</label>
                                                                <select class="form-select" id="form-cuaca" required="" name="cuaca">
                                                                        <option selected="" disabled="" value="">Choose...</option>
                                                                        <option value="panas">Panas</option>
                                                                        <option value="hujan">Hujan</option>
                                                                        <option value="berawan">Berawan</option>
                                                                        <option value="cerah">Cerah</option>
                                                                </select>
                                                                <div class="invalid-feedback">Please select a valid state.</div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                                <label class="form-label" for="form-luas-lahan">Luas Lahan (Ha)</label>
                                                                <input class="form-control" id="form-luas-lahan" type="number" name="luas_lahan" required="">
                                                                <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                        <div class="col-md-6">
                                                                <label class="form-label" for="form-pupuk-urea">Pupuk Urea</label>
                                                                <input class="form-control" id="form-pupuk-urea" type="number" name="pupuk_urea" required="">
                                                                <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <label class="form-label" for="form-pupuk-npk">Pupuk NPK</label>
                                                                <input class="form-control" id="form-pupuk-npk" type="number" name="pupuk_npk" required="">
                                                                <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                </div>
                                                <button class="btn btn-primary" type="button" id="submitBtn">Submit form</button>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
        <!-- Container-fluid Ends-->
</div>
@endsection

@push('jsScript')
@include('admin._layouts._js-table')

<script type="text/javascript">
        $(document).ready(function() {
                $('#alertHasil').hide();
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

                // proses simpan
                $('#submitBtn').click(function(e) {
                        e.preventDefault();
                        $.ajax({
                                data: $('#formPenentuanKomoditas').serialize(),
                                url: "{{ route($title.'.store') }}",
                                type: "POST",
                                dataType: 'json',
                                success: function(data) {
                                        $('#formPenentuanKomoditas').trigger("reset");
                                        $('#hasilKomoditas').html(data.komoditas);
                                        $('#alertHasil').show();
                                        notifySuccess();
                                },
                                error: function(data) {
                                        console.log('Error:', data);
                                        $('#formPenentuanKomoditas').trigger("reset");
                                        notifyError();
                                }
                        });
                });
        });
</script>
@endpush