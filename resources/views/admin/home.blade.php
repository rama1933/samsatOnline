@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')


    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $jumlah_1tahun }}</h2>

                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pendaftaran 1 tahun</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                       <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $jumlah_5tahun }}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pendaftaran 5 tahun
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                       <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                          <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $jumlah_kuasa }}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Surat Kuasa
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                       <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $jumlah_duplikat }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Duplikat
                    </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                       <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $jumlah_balik }}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Balik Nama
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
   <div class="card-body"
        style="background-image: url('{{ asset('/logo/bg.jpg')}}');background-size: 100% 100%;background-repeat: no-repeat;height:500px">
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card  shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 text-xl font-weight-bold text-uppercase text-center">
                                    Selamat Datang Di UPPD Samsat Kandangan</div>

                            </div>
                            <div class="col-auto">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.card-body -->
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
</script>
{{-- <script src="{{asset('js/master/bidang/main.js')}}"></script> --}}
@endsection
