<!DOCTYPE html>
<html>

<head>
    <title>UPPD SAMSAT</title>
</head>
<style>
    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
    }

    .left {
        width: 10%;
    }

    .right {
        width: 90%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        clear: both;
    }

    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
        padding-left: 20px;
    }

    header {
        position: fixed;
        top: -30px;
        left: 0px;
        right: 0px;
    }

    footer {
        position: fixed;
        bottom: -10px;
        left: 0px;
        right: 0px;
    }
</style>

<body>
    <header>
        <hr>
    </header>
    <footer>
        <hr>
    </footer>
    <div class="row" style="text-align: center">
        <div class="column left">
            <img src="{{  public_path() }}/logo/prov.png" style="width:50px">
        </div>
        <div class="column right">
            <h2 style="margin-top: 10px">
                UPPD SAMSAT KANDANGAN
            </h2>
            {{-- <h3 style="margin-top: -15px">
                DINAS KOMUNIKASI DAN INFORMATIKA
            </h3>
            <h6 style="margin-top: -15px">
                Jalan Aluh Idut No. 66 A Kandangan Kab. Hulu Sungai Selatan
                KANDANGAN 71211
            </h6> --}}
        </div>
    </div>
    <hr style="margin-top: -10px">
    <h3 style="text-align: center;">DATA PENDAFTARAN 1 TAHUN</h3>
    <table id="table" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nopol</th>
                <th>No rangka</th>
                <th>No mesin</th>
                <th>Merk</th>
                <th>Tahun Pembuatan</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $data->nopol }}</td>
            <td>{{ $data->no_rangka }}</td>
            <td>{{ $data->no_mesin }}</td>
            <td>{{ $data->merk }}</td>
            <td>{{ $data->tahun }}</td>
            <td>{{ date('d-m-Y',strtotime($data->tanggal)) }}</td>
            <td>
                @if ($data->status == 0)
                Belum DI Verifikasi
                @endif
                @if ($data->status == 1)
                Di Proses
                @endif
                @if ($data->status == 2)
                Selesai
                @endif
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
