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
        ajax: window.location.origin + '/admin/pendaftaran/pendaftaran1tahun/data',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nik',
                name: 'nik'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'nopol',
                name: 'nopol'
            },
            {
                data: 'merk',
                name: 'merk'
            },
            {
                data: 'tahun',
                name: 'tahun'
            },
            {
                data: 'no_rangka',
                name: 'no_rangka'
            },
            {
                data: 'no_mesin',
                name: 'no_mesin'
            },
            {
                data: 'tanggal',
                name: 'tanggal'
            },
            {
                data: 'download_ktp',
                name: 'download_ktp'
            },
            {
                data: 'download_pajak',
                name: 'download_pajak'
            },
            {
                data: 'download_stnk',
                name: 'download_stnk'
            },
            {
                data: 'download_bpkb',
                name: 'download_bpkb'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'buttonadmin',
                name: 'buttonadmin'
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
        url: window.location.origin + '/admin/pendaftaran/pendaftaran1tahun/show',
        method: "GET",
        data: { id: id, _token: '{{ csrf_token() }}' },
        success: function(response) {
            // console.log(response)
            $('#idEdit').empty();
            $('#tahunEdit').empty();
            $('#nopolEdit').empty();
            $('#merkEdit').empty();
            $('#tahunEdit').empty();
            $('#norangkaEdit').empty();
            $('#nomesinEdit').empty();
            $('#idEdit').val(id);
            $('#tahunEdit').val(response['tahun']);
            $('#nopolEdit').val(response['nopol']);
            $('#merkEdit').val(response['merk']);
            $('#norangkaEdit').val(response['no_rangka']);
            $('#nomesinEdit').val(response['no_mesin']);
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
                    url: window.location.origin + '/admin/pendaftaran/pendaftaran1tahun/delete',
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