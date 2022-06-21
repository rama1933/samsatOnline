@extends('layouts.app')

@section('custom_css')
<style>
    /* body {
    background: #5b50bb
    } */

    .form-control:focus {
    box-shadow: none;
    border-color: #5b50bb
    }

    .profile-button {
    background: #5b50bb;
    box-shadow: none;
    border: none
    }

    .profile-button:hover {
    background: #682773
    }

    .profile-button:focus {
    background: #682773;
    box-shadow: none
    }

    .profile-button:active {
    background: #682773;
    box-shadow: none
    }

    .back:hover {
    color: #682773;
    cursor: pointer
    }

    .labels {
    font-size: 11px
    }

    .add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
    }
</style>

@endsection

@section('content')
<div class="container rounded bg-white mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px"
                    src="{{asset('')}}logo/user.png">
                {{-- <span
                    class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span>
                </span> --}}
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
               <form method="post" id="form-edit" action="{{ route('dahsboard.update') }}" enctype="multipart/form-data">
                @csrf
                {{-- @foreach ($user as $user)
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Username</label><input type="text" name="username" class="form-control"
                            placeholder="Username" value="{{ $user->username }}"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control"
                            value="" placeholder="Password"></div>
                </div>
                @endforeach --}}
                @foreach ($biodata as $biodata)
                <input type="hidden" name="id" value="{{ $biodata->id }}">
                <div class="row mt-1">
                    <div class="col-md-12">
                        <label class="labels">NIK</label><input type="text" class="form-control" placeholder="NIK" name="nik" value="{{ $biodata->nik }}">
                    </div>
                   <div class="col-md-12">
                       <label class="labels">Nama</label><input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ $biodata->nama }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">No Hp</label><input type="text" class="form-control" placeholder="No Hp" name="no_hp" value="{{ $biodata->no_hp }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">No Hp</label><input type="text" class="form-control" placeholder="No Hp" name="no_hp" value="{{ $biodata->no_hp }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Alamat</label><input type="text" class="form-control" placeholder="Alamat" name="alamat"
                            value="{{ $biodata->alamat }}">
                    </div>
                </div>
                @endforeach
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="subbmit">Save
                        Profile</button></div>
                    </form>
            </div>
        </div>
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
    setTimeout(location.reload.bind(location), 1000);

    }
    }
    })
    return true;

    })
</script>
{{-- <script src="{{asset('js/master/bidang/main.js')}}"></script> --}}
@endsection
