<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <form id="formInput" name="formInput" action="">
                                @csrf
                                <input type="hidden" name="id" id="formId">
                                <div class="modal-header">
                                        <h3 class="modal-title"><label id="headForm"></label> {{ Helper::head($title) }}</h3>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="row g-1">
                                                <div class="col-md-12">
                                                        <label>Anggota</label>
                                                        <select class="form-control" name="anggota_id" id="anggota_id" required>
                                                                @foreach(Helper::get_data('anggotas') as $v)
                                                                <option value="{{ $v->id }}">{{ $v->nama }}</option>
                                                                @endforeach
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="row g-1 mt-1">
                                                <div class="col-md-6">
                                                        <label>Luas Lahan</label>
                                                        <input type="number" class="form-control" name="luas_lahan" id="luas_lahan" required />
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Satuan Lahan</label>
                                                        <select class="form-control" name="satuan_lahan" id="satuan_lahan" required>
                                                                <option value="m2">m2</option>
                                                                <option value="ha">ha</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="row g-1 mt-1">
                                                <div class="col-md-6">
                                                        <label>Jenis Lahan</label>
                                                        <select class="form-control" name="jenis_lahan" id="jenis_lahan" required>
                                                                <option value="Basah">Basah</option>
                                                                <option value="Kering">Kering</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                        <label>Pupuk</label>
                                                        <select class="form-control" name="pupuk" id="pupuk" required>
                                                                <option value="Urea">Urea</option>
                                                                <option value="ZA">ZA</option>
                                                                <option value="SP-36">SP-36</option>
                                                                <option value="KCL">KCL</option>
                                                                <option value="ZK">ZK</option>
                                                                <option value="Dolomit">Dolomit</option>
                                                                <option value="NPK Phonska">NPK Phonska</option>
                                                        </select>
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
        //Tampilkan form input
        function createForm() {
                $('#formInput').trigger("reset");
                $("#headForm").empty();
                $("#headForm").append("Form Input");
                $('#saveBtn').show();
                $('#updateBtn').hide();
                $('#formId').val('');
                $('#ajaxModel').modal('show');
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
                                $('#kelompok_id').val(data.kelompok_id).trigger('change');
                                $('#luas_lahan').val(data.luas_lahan);
                                $('#satuan_lahan').val(data.satuan_lahan).trigger('change');
                                $('#jenis_lahan').val(data.jenis_lahan).trigger('change');
                                $('#pupuk').val(data.pupuk).trigger('change');
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