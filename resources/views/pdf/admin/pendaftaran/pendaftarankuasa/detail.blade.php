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
    <h3 style="text-align: center;">DETAIL PENDAFTARAN</h3>
    <table id="table" style="width: 100%">
        <tbody>
            @foreach ($data as $data)
            <tr>
                <th style="text-align: left">Jenis Pendaftaran</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">PENDAFTARAN ULANG 1 TAHUN BUKAN ATAS NAMA PEMILIK KENDARAAN</td>
            </tr>
            <tr>
                <th style="text-align: left">Nik</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->biodata->nik }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Nama</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->biodata->nama }}</td>
            </tr>
            <tr>
                <th style="text-align: left">No Hp</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->biodata->no_hp }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Alamat</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->biodata->alamat }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Nopol</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->nopol }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Merk</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->merk }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Tahun Pembuatan</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->tahun }}</td>
            </tr>

            <tr>
                <th style="text-align: left">No Rangka</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->no_rangka }}</td>
            </tr>

            <tr>
                <th style="text-align: left">No Mesin</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->no_mesin }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Tanggal Daftar</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->tanggal }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Status</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
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
