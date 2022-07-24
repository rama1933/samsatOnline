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

    /* table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
        padding-left: 20px;
    } */

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

    @page {
        size: 27cm 25cm;
    }
</style>

<body>
    <header>
        <hr>
    </header>
    <footer>
        <hr>
    </footer>
    {{-- <div class="row" style="text-align: center">
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
    </div> --}}
    <h4 style="text-align: center;"><u>SURAT KUASA</u> </h4>
    <br>
    <table id="table">
        <tbody>
            @foreach ($data as $data)
                <tr>
                    <td style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;"
                        colspan="3">Yang Bertanda Tangan Dibawah Ini :</td>
                </tr>
                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Nama</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->nama1 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Tempat / Tgl. Lahir</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->tempat_lahir1 }} / {{ $data->tanggal_lahir1 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Tanda Pengenal (No. KTP / SIM)</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->no1 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Alamat</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->alamat1 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        No HP</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->no_hp1 }}</td>
                </tr>

                <tr>
                    <td style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;"
                        colspan="3">Memberikan Kuasa Kepada :</td>
                </tr>
                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Nama</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->nama2 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Tempat / Tgl. Lahir</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->tempat_lahir2 }} / {{ $data->tanggal_lahir2 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Tanda Pengenal (No. KTP / SIM)</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->no2 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Alamat</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->alamat2 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        No HP</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->no_hp2 }}</td>
                </tr>

                <tr>
                    <td style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;"
                        colspan="3">Untuk mengurus Pembayaran Pajak Kendaraan / Perpanjangan <br> STNK motor/mobil
                        dengan
                        identitas sebagai berikut :</td>
                </tr>
                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Atas Nama</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->nama2 }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Nomor Polisi</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->nopol }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        Merk / Tipe</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->merk }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        No Rangka</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->no_rangka }}</td>
                </tr>

                <tr>
                    <td
                        style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;">
                        No Mesin</td>
                    <td style="text-align: center;padding-left: -40px">:</td>
                    <td style="padding-left: 10px">{{ $data->no_mesin }}</td>
                </tr>

                <tr>
                    <td style="text-align: left;padding-left:60px;padding-right:60px;border-spacing: 0px;white-space: nowrap;"
                        colspan="3"><br> Demikian Surat Kuasa ini saya buat dengan kesadaran penuh dan tanpa ada
                        paksaan
                        dari pihak manapun</td>
                </tr>

        </tbody>
    </table>
    <table id="table" style="width: 100%;;
            border-collapse: collapse;margin-top:50px;
           ">
        <tbody>
            <td>
                <div class="row" style="text-align: center;float:left;width: 40%;padding-left:30px">

                    <h4 style="margin-bottom: 60px;margin-top: -5px">
                        <br>
                        Penerima Kuasa
                    </h4>
                    <h4 style="margin-bottom: -6px">
                        {{ $data->nama2 }}
                    </h4>

                </div>
            </td>
            <td>
                <div class="row" style="text-align: center;float:right;width: 40%;">
                    <div>
                        <h4 style="margin-bottom: 60px;margin-top: -5px">
                            Kandangan, {{ date('d-m-Y') }} <br>
                            Pemberi Kuasa
                        </h4>
                        <h4 style="margin-bottom: -6px">
                            {{ $data->nama1 }}
                        </h4>

                    </div>
                </div>
            </td>
            @endforeach
</body>

</html>
