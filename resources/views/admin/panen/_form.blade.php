<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <form id="formInput" name="formInput" action="">
                                @csrf
                                <input type="hidden" name="id" id="formId">
                                <input type="hidden" id="_method" name="_method" value="">
                                <div class="modal-header">
                                        <h3 class="modal-title"><label id="headForm"></label> {{ Helper::head($title) }}</h3>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="row g-1">
                                                <div class="col-md-6">
                                                        <label>Lahan</label>
                                                        <select class="form-control" name="lahan_id" id="lahan_id" required>
                                                                @foreach(Helper::get_data_join('lahans', 'anggota') as $v)
                                                                <option value="{{ $v->id_lahans }}">{{ $v->nama }}</option>
                                                                @endforeach
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Bantuan</label>
                                                        <select class="form-control" name="masuk_id" id="masuk_id" required>
                                                                @foreach(Helper::get_data_join('masuks', 'bantuan') as $v)
                                                                <option value="{{ $v->id_masuks }}">{{ $v->nama }} {{$v->jumlah}} {{$v->satuan}}</option>
                                                                @endforeach
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="row g-1 mt-1">
                                                <div class="col-md-6">
                                                        <label>Tanggal Tanam</label>
                                                        <input type="date" class="form-control" name="tanggal_tanam" id="tanggal_tanam" required />
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Tanggal Panen</label>
                                                        <input type="date" class="form-control" name="tanggal_panen" id="tanggal_panen" required />
                                                </div>
                                        </div>
                                        <div class="row g-1  mt-1">
                                                <div class="col-md-6">
                                                        <label>Jumlah Panen</label>
                                                        <input type="number" class="form-control" name="jumlah_panen" id="jumlah_panen" required />
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Satuan Panen</label>
                                                        <select class="form-control" name="satuan_panen" id="satuan_panen" required>
                                                                <option value="kg">Kg</option>
                                                                <option value="kwintal">Kwintal</option>
                                                                <option value="ton">Ton</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="row g-1  mt-1">
                                                <div class="col-md-6">
                                                        <label>Jumlah Gagal</label>
                                                        <input type="number" class="form-control" name="jumlah_gagal" id="jumlah_gagal" required />
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Satuan Gagal</label>
                                                        <select class="form-control" name="satuan_gagal" id="satuan_gagal" required>
                                                                <option value="kg">Kg</option>
                                                                <option value="kwintal">Kwintal</option>
                                                                <option value="ton">Ton</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="row g-1 mt-1">
                                                <div class="col-md-12">
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" name="keterangan" id="keterangan" required></textarea>
                                                </div>
                                        </div>
                                        <div class="row g-2 mt-1">
                                                <div class="col-md-12">
                                                        <label>Gambar</label>
                                                        <input class="form-control" type="file" name="image" id="image">
                                                        <input type="hidden" name="image_old" id="image_old">
                                                </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="button" id="saveBtn" value="create">Save</button>
                                        <button class="btn btn-primary" type="button" id="updateBtn" value="update">Update</button>
                                </div>
                        </form>
                </div>
        </div>
</div>


@push('jsScriptAjax')
<script type="text/javascript">
        let lats, longs;

        //Tampilkan form input
        function createForm() {
                $('#formInput').trigger("reset");
                $("#headForm").empty();
                $("#headForm").append("Form Input");
                $('#saveBtn').show();
                $('#updateBtn').hide();
                $('#formId').val('');
                $('#ajaxModel').modal('show');
                $('#_method').val('POST');
        }

        //Tampilkan form edit
        function editForm(id) {
                let urlx = "{{ $title }}"
                $.ajax({
                        url: urlx + '/' + id + '/edit',
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                                $("#headForm").empty();
                                $("#headForm").append("Form Edit");
                                $('#formInput').trigger("reset");
                                $('#ajaxModel').modal('show');
                                $('#saveBtn').hide();
                                $('#updateBtn').show();
                                $('#formId').val(data.id);
                                $('#_method').val('PUT');
                                $('#lahan_id').val(data.lahan_id).trigger('change');
                                $('#masuk_id').val(data.masuk_id).trigger('change');
                                $('#tanggal_tanam').val(data.tanggal_tanam).trigger('change');
                                $('#tanggal_panen').val(data.tanggal_panen).trigger('change');
                                $('#jumlah_panen').val(data.jumlah_panen)
                                $('#satuan_panen').val(data.satuan_panen).trigger('change');
                                $('#jumlah_gagal').val(data.jumlah_gagal)
                                $('#satuan_gagal').val(data.satuan_gagal).trigger('change');
                                $('#keterangan').val(data.keterangan)
                                $('#image_old').val(data.image)
                        },
                        error: function() {
                                var setting = {
                                        type: 'danger',
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
                                $.notify('Unable to display data!', setting);
                        }
                });
        }
</script>
@endpush