@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="card">
    <div class="card-header" style="background-color: rgb(241, 241, 241)">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title"> TABEL PENDAFTARAN BEA BALIK NAMA (BBN)</h4>
            </div>
            <div class="col-6">
                {{-- <button data-toggle="modal" data-target="#modal-create" class="btn btn-md btn-primary float-right"><i class="fa fa-plus"></i>
                    Tambah</button> --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="ml-md-auto">
        <a href="{{ route('pdf.balikadmin') }}" target="_blank" title="Unduh Dokumen (PDF)"
    class="btn btn-md btn-success mb-3"><i class="fa fa-print"></i> Cetak</a>
        </div>
        <div class="table-responsive">
            <table class="table" id="table">
                <thead class="bg-primary text-white">
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        No
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Nik
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Nama
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        No Polisi
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Merk
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tahun
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        No Rangka
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        No Mesin
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Tanggal
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        KTP
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Pajak
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        STNK
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        BPKB
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Surat Keterangan
                    </th>
                    <th style="padding-left:40px;padding-right:40px;border-spacing: 0px;white-space: nowrap;">
                        Kwitansi Pembelian
                    </th>
                    <th style="padding-left:80px;padding-right:80px;border-spacing: 0px;white-space: nowrap;">
                        Status
                    </th>
                    <th style="padding-left:80px;padding-right:80px;border-spacing: 0px;white-space: nowrap;">
                        Aksi
                    </th>

                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.trxpendaftaran.pendaftaranbalik.form')
@endsection

@section('custom_js')
<script >
    $(document).ready(function() {
        $('#table').DataTable({
        });
    });
    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode> 57))

        return false;
        return true;
        }

        function status(id) {
        let status = $(".status" + id).val(),
        type = 'balik';
        $.ajax({
        url: window.location.origin + '/updatestatus',
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { id: id, status: status,type:type},
        beforeSend: function() {},
        success: function(data) {
        $('#table').DataTable().ajax.reload();
        swal('Berhasil Mengubah status', {
        icon: 'success',
        });
        }
        });
        }
</script>
<script src="{{asset('js/pendaftaran/admin/pendaftaranbalik/main.js')}}"></script>
@endsection
