@extends('template.master_admin')

@section('title_web')
Data Contact Landing Page - Bimbel Primago
@endsection

@section('title_content')
Contact
@endsection

@section('breadcrumbs')
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Data Contact</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Contact</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Contact
                    <button type="button" data-toggle="modal" data-target="#ModalContact"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        CONTACT</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableContact" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi Lokasi</th>
                                <th>Alamat Email</th>
                                <th>No Telepon</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="ModalContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Data Contact</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('add.contact') }}" method="POST" id="add-contact" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="deskripsi_lokasi">Masukkan Deskripsi Lokasi</label>
                        <input type="text" class="form-control" id="deskripsi_lokasi" name="deskripsi_lokasi">
                        <span class="text-danger error-text deskripsi_lokasi_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="alamat_email">Masukkan Alamat Email</label>
                        <input type="email" class="form-control" id="alamat_email" name="alamat_email">
                        <span class="text-danger error-text alamat_email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Masukkan No Telepon</label>
                        <input type="number" class="form-control" id="no_telepon" name="no_telepon">
                        <span class="text-danger error-text no_telepon_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Masukkan Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="image">Pilih Foto</label>
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"
                            id="btn_close">BATALKAN</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('admin.home.edit') --}}

<!-- Edit Modal -->
<div class="modal fade editContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Edit Management Contact</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('update.contact') }}" method="POST" id="update-contact" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="contact_id">
                        <label for="deskripsi_lokasi">Edit Deskripsi Lokasi</label>
                        <input type="text" class="form-control" id="deskripsi_lokasi" name="deskripsi_lokasi">
                        <span class="text-danger error-text deskripsi_lokasi_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="alamat_email">Edit Alamat Email</label>
                        <input type="text" class="form-control" id="alamat_email" name="alamat_email">
                        <span class="text-danger error-text alamat_email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Edit No Telepon</label>
                        <input type="number" class="form-control" id="no_telepon" name="no_telepon">
                        <span class="text-danger error-text no_telepon_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Edit Foto - Kosongkan Bila Sama</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="image">Pilih Foto</label>
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"
                            id="btn_close">BATALKAN</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function () {
        var table = $('#tableContact').DataTable({
            destroy: true,
            searching: true,
            processing: true,
            serverSide: true,
            "responsive": true,
            "autoWidth": false,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('data.contact.ajax') }}",
                type: "get",
                data: function (data) {
                    data = '';
                    return data
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'deskripsi_lokasi',
                    name: 'deskripsi_lokasi'
                },
                {
                    data: 'alamat_email',
                    name: 'alamat_email'
                },
                {
                    data: 'no_telepon',
                    name: 'no_telepon'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-contact').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            $('#saveBtn').html('Sedang Mengirim...');
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(form).find('span.error-text').text('');
                },
                success: function (data) {
                    if (data.code == 0) {
                        $.each(data.error, function (prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                        $('#saveBtn').html('Simpan');
                    } else {
                        $(form)[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                        $('#tableContact').DataTable().ajax.reload(null, false);
                        $('#ModalContact').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editContactBtn', function () {
        var contact_id = $(this).data('id');
        $('.editContact').find('form')[0].reset();
        $('.editContact').find('span.error-text').text('');
        $.post('{{ route("get.contact.edit") }}', {
            contact_id: contact_id
        }, function (data) {
            $('.editContact').find('input[name="contact_id"]').val(data.details.id);
            $('.editContact').find('input[name="deskripsi_lokasi"]').val(data.details
                .deskripsi_lokasi);
            $('.editContact').find('input[name="alamat_email"]').val(data.details
                .alamat_email);
            $('.editContact').find('input[name="no_telepon"]').val(data.details
                .no_telepon);
            $('.editContact').modal('show');
        }, 'json');
    });

    $('#update-contact').on('submit', function (e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[
                            0]);
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: data.status,
                        text: data.message,
                        timer: 1200
                    });
                    $('#tableContact').DataTable().ajax.reload(null, false);
                    $('.editContact').modal('hide');
                    $('.editContact').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteContactBtn', function () {
        var contact_id = $(this).data('id');
        var url = '{{ route("delete.contact") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Home",
            icon: "warning",
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'BATAL',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(function (result) {
            if (result.value) {
                $.post(url, {
                    contact_id: contact_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableContact').DataTable().ajax.reload(null,
                            false);
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                    }
                }, 'json');
            }
        });

    });
</script>
@endpush
@endsection