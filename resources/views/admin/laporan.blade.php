@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/animate.css">
    <link rel="stylesheet" href="{{ asset('') }}carousel/css/style.css">

@endsection

@section('content')
<div class="row">
<div class="col-xl-12 col-md-12 mb-2">
    <div class="card  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <form action="{{route('pdf.1tahunadmin')}}" target="_blank">
                                <td>
                                   <h5>Cetak Laporan Pendaftaran 1 tahun</h5>
                                </td>
                                <td>
                                    <select name="status" id="status" class="form-control select2" style="width:100%" required>
                                        <option value="0">Belum Diverifikasi</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form action="{{route('pdf.1tahunonlineadmin')}}" target="_blank">
                                <td>
                                    <h5>Cetak Laporan Pendaftaran 1 tahun Online</h5>
                                </td>
                                <td>
                                    <select name="status" id="status" class="form-control select2" style="width:100%" required>
                                        <option value="0">Belum Diverifikasi</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form action="{{route('pdf.5tahunadmin')}}" target="_blank">
                                <td>
                                    <h5>Cetak Laporan Pendaftaran 5 tahun</h5>
                                </td>
                                <td>
                                    <select name="status" id="status" class="form-control select2" style="width:100%" required>
                                        <option value="0">Belum Diverifikasi</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form action="{{route('pdf.kuasaadmin')}}" target="_blank">
                                <td>
                                    <h5>Cetak Laporan Pendaftaran 1 tahun bukan atas nama pemilik kendaraan</h5>
                                </td>
                                <td>
                                    <select name="status" id="status" class="form-control select2" style="width:100%" required>
                                        <option value="0">Belum Diverifikasi</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form action="{{route('pdf.duplikatadmin')}}" target="_blank">
                                <td>
                                   <h5>Cetak Laporan Pendaftaran Duplikat</h5>
                                </td>
                                <td>
                                    <select name="status" id="status" class="form-control select2" style="width:100%" required>
                                        <option value="0">Belum Diverifikasi</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form action="{{route('pdf.balikadmin')}}" target="_blank">
                                <td>
                                    <h5>Cetak Laporan Pendaftaran Bea Balik Nama (BBN)</h5>
                                </td>
                                <td>
                                    <select name="status" id="status" class="form-control select2" style="width:100%" required>
                                        <option value="0">Belum Diverifikasi</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </form>
                        </tr>
                        {{--  <tr>
                            <td>
                                <h5>Cetak Laporan Pendaftaran 5 tahun</h5>
                            </td>
                            <td>
                                <a href="{{route('pdf.5tahunadmin')}}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Cetak Laporan Pendaftaran 1 tahun bukan atas nama pemilik kendaraan</h5>
                            </td>
                            <td>
                                <a href="{{route('pdf.kuasaadmin')}}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Cetak Laporan Pendaftaran Duplikat</h5>
                            </td>
                            <td>
                                <a href="{{route('pdf.duplikatadmin')}}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Cetak Laporan Pendaftaran Bea Balik Nama (BBN)</h5>
                            </td>
                            <td>
                                <a href="{{route('pdf.balikadmin')}}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        <tr>
                        <td>  --}}
                        <tr>
                        <td colspan="2">
                            <h5>Cetak Biodata</h5>
                        </td>
                        <td><a href="{{ route('pdf.biodataadmin') }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h5>Cetak User</h5>
                            </td>
                            <td><a href="{{ route('pdf.user') }}" target="_blank" class="btn btn-success"><i
                                        class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


@include('user.pendaftaran.pendaftaran1tahun.form')
@endsection

@section('custom_js')

{{-- <script src="{{ asset('') }}carousel/js/jquery.min.js"></script> --}}
<script src="{{ asset('') }}carousel/js/popper.js"></script>
<script src="{{ asset('') }}carousel/js/bootstrap.min.js"></script>
<script src="{{ asset('') }}carousel/js/owl.carousel.min.js"></script>
<script src="{{ asset('') }}carousel/js/main.js"></script>
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
