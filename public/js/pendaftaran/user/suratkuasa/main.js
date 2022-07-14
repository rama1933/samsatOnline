$(document).ready(function() {
    datatable();
});

function AddModal() {
    $('#addModal').modal('show');
}

function datatable() {
    $('#table')
        .DataTable()
        .destroy();

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            processing: "<img src='" + window.origin + "/img/805.gif'> Memuat Data"
        },
        ajax: window.location.origin + '/pendaftaran/suratkuasa/data',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama1',
                name: 'nama1'
            },
            {
                data: 'nama2',
                name: 'nama2'
            },
            {
                data: 'nama3',
                name: 'nama3'
            },
            {
                data: 'nopol',
                name: 'nopol'
            },
            {
                data: 'button',
                name: 'button'
            }
        ]
    });
}

$('#form-create').on('submit', function(e) {
    e.preventDefault()

    $("#form-create").ajaxSubmit({
        beforeSend: function() {
            $('#tombol').hide();
            $('#loading').show();
        },
        success: function(res) {
            if (res.status == "failed") {
                swal('Username sudah terdaftar', '', 'error');
                $('#tombol').show();
                $('#loading').hide();
            } else if (res.status == "required") {
                swal('Form tidak boleh kosong', '', 'error');
                $('#tombol').show();
                $('#loading').hide();
            } else if (res.status = "success") {
                $('#table').DataTable().ajax.reload();
                // location.reload();
                swal('Data Berhasil Di Simpan', '', 'success');
                //set semua ke default
                $("#form-create input:not([name='_token'],[name='user_id'],[name='biodata_id']").val('')
                $("#modal-create").modal('hide')
                $('#tombol').show();
                $('#loading').hide();
            }
        }
    })
    return true;

})

function edit(id) {
    $.ajax({
        url: window.location.origin + '/pendaftaran/suratkuasa/show',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            // console.log(response)
            $('#idEdit').empty();
            $('#nama1Edit').empty();
            $('#nama2Edit').empty();
            $('#nama3Edit').empty();
            $('#no1Edit').empty();
            $('#no2Edit').empty();
            $('#tempat_lahir1Edit').empty();
            $('#tempat_lahir2Edit').empty();
            $('#tanggal_lahir1Edit').empty();
            $('#tanggal_lahir2Edit').empty();
            $('#no_hp1Edit').empty();
            $('#no_hp2Edit').empty();
            $('#alamat1Edit').empty();
            $('#alamat2Edit').empty();
            $('#nopolEdit').empty();
            $('#merkEdit').empty();
            $('#no_rangkaEdit').empty();
            $('#no_mesinEdit').empty();
            $('#idEdit').val(id);
            $('#nama1Edit').val(response['nama1']);
            $('#nama2Edit').val(response['nama2']);
            $('#nama3Edit').val(response['nama3']);
            $('#no1Edit').val(response['no1']);
            $('#no2Edit').val(response['no2']);
            $('#tempat_lahir1Edit').val(response['tempat_lahir1']);
            $('#tempat_lahir2Edit').val(response['tempat_lahir2']);
            $('#tanggal_lahir1Edit').val(response['tanggal_lahir1']);
            $('#tanggal_lahir2Edit').val(response['tanggal_lahir2']);
            $('#no_hp1Edit').val(response['no_hp1']);
            $('#no_hp2Edit').val(response['no_hp2']);
            $('#alamat1Edit').val(response['alamat1']);
            $('#alamat2Edit').val(response['alamat2']);
            $('#nopolEdit').val(response['nopol']);
            $('#merkEdit').val(response['merk']);
            $('#no_rangkaEdit').val(response['no_rangka']);
            $('#no_mesinEdit').val(response['no_mesin']);
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
            $('#table').DataTable().ajax.reload();
            // location.reload();
            swal('Data Berhasil Di Simpan', '', 'success');
            //set semua ke default
            $("#form-edit input:not([name='_token']").val('')
            $("#modal-edit").modal('hide')
            $('#tombol').show();
            $('#loading').hide();
        }
    })
    return true;

})


function deletebtn(id) {
    var token = '{{ csrf_token() }}'
    swal({
            title: 'Anda Yakin Ingin Menghapus Data?',
            text: '',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: window.location.origin + '/pendaftaran/suratkuasa/delete',
                    method: "POST",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { id: id },
                    success: function(results) {
                        $('#table').DataTable().ajax.reload();
                        swal('Berhasil Menghapus Data', {
                            icon: 'success',
                        });
                    }
                });

            } else {
                swal('Data Batal Dihapus');
            }
        });
}