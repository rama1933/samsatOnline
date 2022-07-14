@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="row">

                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-primary text-center">
                                <h1 class="font-light text-white">{{ $jumlah_pendaftaran }}</h1>
                                <h6 class="text-white">Total Pendaftaran</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-cyan text-center">
                                <h1 class="font-light text-white">{{ $jumlah_belum }}</h1>
                                <h6 class="text-white">Belum Diverifikasi</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-warning text-center">
                                <h1 class="font-light text-white">{{ $jumlah_diproses }}</h1>
                                <h6 class="text-white">Diproses</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-success text-center">
                                <h1 class="font-light text-white">{{ $jumlah_selesai }}</h1>
                                <h6 class="text-white">Selesai</h6>
                            </div>
                        </div>
                    </div>
                </div>
<div class="row">
    <div class="col-12">
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <span class="opacity-7 text-muted"><i data-feather="plus" ></i></span>
                        </div>
                        <a href="{{ route('pendaftaran1tahun.index') }}">
                            <h4 class="text-muted font-weight-normal ml-4 mt-2 w-100 text-truncate">PENDAFTARAN ULANG 1 TAHUN</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <span class="opacity-7 text-muted"><i data-feather="plus"></i></span>
                            </div>
                            <a href="{{ route('pendaftaran1tahunonline.index') }}">
                                <h4 class="text-muted font-weight-normal ml-4 mt-2 w-100 text-truncate">PENDAFTARAN ULANG 1 TAHUN ONLINE</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <span class="opacity-7 text-muted"><i data-feather="plus"></i></span>
                            </div>
                            <a href="{{ route('pendaftaran5tahun.index') }}">
                            <h4 class="text-muted font-weight-normal ml-4 mt-2 w-100 text-truncate">PENDAFTARAN ULANG 5 TAHUN</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <span class="opacity-7 text-muted"><i data-feather="plus"></i></span>
                            </div>
                            <a href="{{ route('pendaftarankuasa.index') }}">
                            <h4 class="text-muted font-weight-normal ml-4 mt-2 w-100 text-truncate">PENDAFTARAN ULANG 1 TAHUN BUKAN
                            ATAS NAMA PEMILIK KENDARAAN</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <span class="opacity-7 text-muted"><i data-feather="plus"></i></span>
                            </div>
                            <a href="{{ route('pendaftaranduplikat.index') }}">
                            <h4 class="text-muted font-weight-normal ml-4 mt-2 w-100 text-truncate">PENDAFTARAN DUPLIKAT</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <span class="opacity-7 text-muted"><i data-feather="plus"></i></span>
                            </div>
                            <a href="{{ route('pendaftaranbalik.index') }}">
                            <h4 class="text-muted font-weight-normal ml-4 mt-2 w-100 text-truncate">PENDAFTARAN BEA BALIK NAMA (BBN)</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Edit Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="#" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nik">NIK <small class="text-danger">*</small></label>
                            <input type="text" id="nikEdit" name="nik" class="form-control"
                                onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nama">Nama <small class="text-danger">*</small></label>
                            <input type="text" id="namaEdit" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">No HP <small class="text-danger">*</small></label>
                            <input type="text" id="nohpEdit" name="no_hp" class="form-control"
                                onkeypress="return hanyaAngka(event)" required>
                        </div>
                        <div class="col-md-12">
                            <label for="no_hp">Alamat <small class="text-danger">*</small></label>
                            <textarea class="form-control" id="alamatEdit" name="alamat" rows="5" data-rule="required"
                                required></textarea>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tempat_lahir">Tempat Lahir <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="tempatlahirEdit" name="tempat_lahir" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tanggal_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
                            <input type="date" class="form-control" id="tanggallahirEdit" name="tanggal_lahir"
                                required />
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                        <button type="submit" id="loading" class="btn btn-warning" style="display: none;"
                            disabled>LOADING......</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('admin.master.jenis.form') --}}
@endsection

@section('custom_js')
<script>
    $(document).ready(function() {
        $('#table').DataTable({
        });
    });

    function edit(id) {
    $.ajax({
    url: window.location.origin + '/show?type=biodata',
    method: "GET",
    data: { id: id, _token: '{{ csrf_token() }}' },
    success: function(response) {
    console.log(response)
    $('#idEdit').empty();
    $('#namaEdit').empty();
    $('#nikEdit').empty();
    $('#nohpEdit').empty();
    $('#alamatEdit').empty();
    $('#ttlEdit').empty();
    $('#idEdit').val(id);
    $('#nikEdit').val(response['nik']);
    $('#nohpEdit').val(response['no_hp']);
    $('#alamatEdit').val(response['alamat']);
    $('#tempatlahirEdit').val(response['tempat_lahir']);
    $('#tanggallahirEdit').val(response['tanggal_lahir']);
    $('#namaEdit').val(response['nama']);
    }
    })
    }
    $('#form-edit').on('submit', function(e) {
    e.preventDefault()

    $("#form-edit").ajaxSubmit({
    beforeSend: function() {
    $('#tombol').hide();
    $('#loading').show();
    },
    success: function(res) {
    if (res.status == "failed") {
    swal('NIK sudah terdaftar', '', 'error');
    $('#tombol').show();
    $('#loading').hide();
    } else if (res.status = "success") {
    $('#table').DataTable().ajax.reload();
    // location.reload();
    swal('Data Berhasil Di Simpan', '', 'success');
    //set semua ke default
    $("#form-edit input:not([name='_token']").val('')
    $("#modal-edit").modal('hide')
    $('#tombol').show();
    $('#loading').hide();
    }
    }
    })
    return true;

    })
</script>
{{-- <script src="{{asset('js/master/bidang/main.js')}}"></script> --}}
@endsection
