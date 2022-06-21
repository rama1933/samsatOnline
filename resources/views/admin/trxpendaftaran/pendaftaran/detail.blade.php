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
    <h3 style="text-align: center;">DATA PENDAFTARAN DETAIL</h3>
    <table id="table" style="width: 100%">
        <tbody>
            @foreach ($data as $data)
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
                <th style="text-align: left">Jenis</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    {{ $data->jenis->nama }}
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Merk</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    {{ $data->merk->nama }}
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Tipe</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    {{ $data->type->nama }}
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Warna</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->warna }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tahun</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $data->warna }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl Pendaftaran</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ date('d-m-Y',strtotime($data->tanggal)) }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Nopol</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                @if ($data->pendaftarans->nopol == null or $data->pendaftarans->nopol =='')
                    Belum Diverifikasi
                @else
                    {{ $data->pendaftarans->nopol }}
                @endif
            </td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl STNK</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    @if ($data->pendaftarans->tgl_stnk == null or $data->pendaftarans->tgl_stnk =='')
                    Belum Diverifikasi
                    @else
                    {{ date('d-m-Y',strtotime($data->pendaftarans->tgl_stnk)) }}
                    @endif
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl Pajak</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    @if ($data->pendaftarans->tgl_pajak == null or $data->pendaftarans->tgl_pajak =='')
                    Belum Diverifikasi
                    @else
                    {{ date('d-m-Y',strtotime($data->pendaftarans->tgl_pajak)) }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
