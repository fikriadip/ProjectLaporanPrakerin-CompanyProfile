@extends('template.master_admin')

@section('title_web')
Data About Landing Page - Bimbel Primago
@endsection

@section('title_content')
About
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
        <a href="#">Data About</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data About</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable About
                    <button type="button" data-toggle="modal" data-target="#ModalAbout"
                        class="btn btn-primary float-right text-white"><i class="fas fa-plus mr-2"></i> TAMBAH DATA
                        ABOUT</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableAbout" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Link Youtube</th>
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
<div class="modal fade" id="ModalAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">TAMBAH DATA ABOUT
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('add.about') }}" method="POST" id="add-about">
                                @csrf
                                <div class="mb-3">
                                    <label for="judul" class="form-label h6 font-weight-bold">Masukkan Judul
                                        About</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-heading ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="judul" name="judul">
                                    </div>
                                    <span class="text-danger error-text judul_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="subjudul" class="form-label h6 font-weight-bold">Masukkan Subjudul
                                        About</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-comment-alt ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="subjudul" class="form-control input-custom"
                                            name="subjudul" />
                                    </div>
                                    <span class="text-danger error-text subjudul_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="link_youtube" class="form-label h6 font-weight-bold">Masukkan Link Youtube About</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-video ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="link_youtube" class="form-control input-custom"
                                            name="link_youtube" />
                                    </div>
                                    <span class="text-danger error-text link_youtube_error"></span>
                                </div>

                                <center>
                                    <button type="reset"
                                        class="btn btn-sm btn-reset text-white btn-block font-weight-bold mb-3 mt-4"
                                        style="font-size: 18px">BATALKAN</button>

                                        <button type="submit"
                                        class="btn btn-sm btn-save text-white btn-block font-weight-bold mb-3 mt-4"
                                        style="font-size: 18px" id="saveBtn">SIMPAN</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade editAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">EDIT DATA ABOUT
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('update.about') }}" method="POST" id="update-about">
                                @csrf
                                <input type="hidden" name="about_id">
                                <div class="mb-3">
                                    <label for="judul" class="form-label h6 font-weight-bold">Edit Judul About</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-heading ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="judul" name="judul">
                                    </div>
                                    <span class="text-danger error-text judul_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="subjudul" class="form-label h6 font-weight-bold">Edit Subjudul
                                        About</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-comment-alt ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="subjudul" class="form-control input-custom"
                                            name="subjudul" />
                                    </div>
                                    <span class="text-danger error-text subjudul_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="link_youtube" class="form-label h6 font-weight-bold">Edit Link Youtube
                                        About</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-video ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="link_youtube" class="form-control input-custom"
                                            name="link_youtube" />
                                    </div>
                                    <span class="text-danger error-text link_youtube_error"></span>
                                </div>

                                <center>
                                    <button type="reset"
                                        class="btn btn-sm btn-reset text-white btn-block font-weight-bold mb-3 mt-4"
                                        style="font-size: 18px">BATALKAN</button>

                                        <button type="submit"
                                        class="btn btn-sm btn-save text-white btn-block font-weight-bold mb-3 mt-4"
                                        style="font-size: 18px" id="saveBtn">SIMPAN</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
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
        var table = $('#tableAbout').DataTable({
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
                url: "{{ route('data.about.ajax') }}",
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
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'subjudul',
                    name: 'subjudul'
                },
                {
                    data: 'link_youtube',
                    name: 'link_youtube'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-about').on('submit', function (e) {
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
                        $('#saveBtn').html('SIMPAN');
                    } else {
                        $(form)[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                        $('#tableAbout').DataTable().ajax.reload(null, false);
                        $('#ModalAbout').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editAboutBtn', function () {
        var about_id = $(this).data('id');
        $('.editAbout').find('form')[0].reset();
        $('.editAbout').find('span.error-text').text('');
        $.post('{{ route("get.about.edit") }}', {
            about_id: about_id
        }, function (data) {
            $('.editAbout').find('input[name="about_id"]').val(data.details.id);
            $('.editAbout').find('input[name="judul"]').val(data.details
                .judul);
            $('.editAbout').find('input[name="subjudul"]').val(data.details
                .subjudul);
            $('.editAbout').find('input[name="link_youtube"]').val(data.details
                .link_youtube);
            $('.editAbout').modal('show');
        }, 'json');
    });

    $('#update-about').on('submit', function (e) {
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
                    $('#tableAbout').DataTable().ajax.reload(null, false);
                    $('.editAbout').modal('hide');
                    $('.editAbout').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteAboutBtn', function () {
        var about_id = $(this).data('id');
        var url = '{{ route("delete.about") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data About",
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
                    about_id: about_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableAbout').DataTable().ajax.reload(null,
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