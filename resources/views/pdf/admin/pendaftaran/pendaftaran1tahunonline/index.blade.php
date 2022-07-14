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
            PEMERINTAH PROVINSI KALIMANTAN SELATAN
            BADAN KEUANGAN DAERAH
            UNIT PELAYANAN PENDAPATAN DAERAH (UPPD)
            KANDANGAN
        </h2>
        <h6 style="margin-top: -15px">
            Jl. Jend. Sudirman Km. 3,5 RT.2 RW.1 Desa Karasikan Kec. Sungai Raya Kandangan 71271
            Telp./Fax (0517) 21237 Email : uppdkandangan.dispenda@gmail.com
        </h6>
    </div>
</div>
    <hr style="margin-top: -10px">
    <h3 style="text-align: center;">DATA PENDAFTARAN 1 TAHUN ONLINE</h3>
    <table id="table" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nopol</th>
                <th>No rangka</th>
                <th>No mesin</th>
                <th>Merk</th>
                <th>Tahun Pembuatan</th>
                <th>UUPD</th>
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
            <td>{{ $data->tempat }}</td>
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
   <div class="row" style="text-align: center;float:right;width: 30%;">
        <div>
            {{-- <table style="margin-top: 10px;width: 100%;border: none">
                <tr style="border: none">
                    <td style="border: none">Dikeluarkan</td>
                    <td style="border: none">:</td>
                    <td style="border: none">Dikandangan</td>
                </tr>
                <tr>
                    <td style="border: none">Pada Tanggal</td>
                    <td style="border: none">:</td>
                    <td style="border: none">{{ date('d-m-Y') }}</td>
                </tr>
            </table>
            <hr> --}}
            <h4 style="margin-bottom: 90px;margin-top: 15px">
                Mengetahui, <br>
                <h4 style="margin-top: 2px">
                    An. Kepala UPPD Kandangan
                    Kasi pelayanan PKB BBN KB
                </h4>
            </h4>
            <h4 style="margin-bottom: -6px">
                GUSTI ROBY AZWAR, S.AP
                <br>
                NIP. 19670603 199303 1 011
            </h4>
            {{--
            <hr>
            <h6 style="margin-top: -6px">
                Kepala UPPD Kandangan
                kasi pelayanan PKB BBNKB
            </h6> --}}
        </div>
    </div>
</body>

</html>
