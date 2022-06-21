@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title"> TABEL USER</h4>
            </div>
            <div class="col-6">
                <button data-toggle="modal" data-target="#modal-create" class="btn btn-md btn-primary float-right"><i class="fa fa-plus"></i>
                    Tambah</button>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="ml-md-auto">
        <a href="{{ route('pdf.user') }}" target="_blank" title="Unduh Dokumen (PDF)" class="btn btn-md btn-success mb-3"><i class="fa fa-print"></i> Cetak</a>
      </div>
        <div class="table-responsive">
            <table class="table" id="table">
                <thead class="bg-primary text-white">
                    <th>
                        No
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Aksi
                    </th>

                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.user.form')
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
</script>
<script src="{{asset('js/user/main.js')}}"></script>
@endsection
