<?php

namespace App\Repositories;

class UploadRepository
{
    public function __construct()
    {
        //
    }

    public function uploadpendaftaran1tahun($ktp, $pajak, $stnk, $bpkb)
    {
        $ktp_path = 'kosong';
        if ($ktp != null) {
            $ktp_path = $ktp->store(
                'ktp',
                'public'
            );
        }

        $pajak_path = 'kosong';
        if ($pajak != null) {
            $pajak_path = $pajak->store(
                'pajak',
                'public'
            );
        }

        $stnk_path = 'kosong';
        if ($stnk != null) {
            $stnk_path = $stnk->store(
                'ktp',
                'public'
            );
        }

        $bpkb_path = 'kosong';
        if ($bpkb != null) {
            $bpkb_path = $bpkb->store(
                'bpkb',
                'public'
            );
        }

        return $data = [
            'ktp' => $ktp_path,
            'pajak' => $pajak_path,
            'stnk' => $stnk_path,
            'bpkb' => $bpkb_path,
        ];
    }

    public function uploadpendaftaran5tahun($ktp, $pajak, $stnk, $bpkb, $no_rangka_upload, $no_mesin_upload)
    {
        $ktp_path = 'kosong';
        if ($ktp != null) {
            $ktp_path = $ktp->store(
                'ktp',
                'public'
            );
        }

        $pajak_path = 'kosong';
        if ($pajak != null) {
            $pajak_path = $pajak->store(
                'pajak',
                'public'
            );
        }

        $stnk_path = 'kosong';
        if ($stnk != null) {
            $stnk_path = $stnk->store(
                'ktp',
                'public'
            );
        }

        $bpkb_path = 'kosong';
        if ($bpkb != null) {
            $bpkb_path = $bpkb->store(
                'bpkb',
                'public'
            );
        }

        $no_rangka_upload_path = 'kosong';
        if ($no_rangka_upload != null) {
            $no_rangka_upload_path = $no_rangka_upload->store(
                'no_rangka_upload',
                'public'
            );
        }

        $no_mesin_upload_path = 'kosong';
        if ($no_mesin_upload != null) {
            $no_mesin_upload_path = $no_mesin_upload->store(
                'no_mesin_upload',
                'public'
            );
        }

        return $data = [
            'ktp' => $ktp_path,
            'pajak' => $pajak_path,
            'stnk' => $stnk_path,
            'bpkb' => $bpkb_path,
            'no_rangka_upload' => $no_rangka_upload_path,
            'no_mesin_upload' => $no_mesin_upload_path,
        ];
    }

    public function uploadpendaftaranKuasa($ktp, $pajak, $stnk, $bpkb, $surat_kuasa, $no_rangka_upload, $no_mesin_upload, $surat_keterangan)
    {
        $ktp_path = 'kosong';
        if ($ktp != null) {
            $ktp_path = $ktp->store(
                'ktp',
                'public'
            );
        }

        $pajak_path = 'kosong';
        if ($pajak != null) {
            $pajak_path = $pajak->store(
                'pajak',
                'public'
            );
        }

        $stnk_path = 'kosong';
        if ($stnk != null) {
            $stnk_path = $stnk->store(
                'ktp',
                'public'
            );
        }

        $bpkb_path = 'kosong';
        if ($bpkb != null) {
            $bpkb_path = $bpkb->store(
                'bpkb',
                'public'
            );
        }

        $surat_kuasa_path = 'kosong';
        if ($surat_kuasa != null) {
            $surat_kuasa_path = $surat_kuasa->store(
                'surat_kuasa',
                'public'
            );
        }

        $surat_keterangan_path = 'kosong';
        if ($surat_keterangan != null) {
            $surat_keterangan_path = $surat_keterangan->store(
                'surat_keterangan',
                'public'
            );
        }

        $no_rangka_upload_path = 'kosong';
        if ($no_rangka_upload != null) {
            $no_rangka_upload_path = $no_rangka_upload->store(
                'no_rangka_upload',
                'public'
            );
        }

        $no_mesin_upload_path = 'kosong';
        if ($no_mesin_upload != null) {
            $no_mesin_upload_path = $no_mesin_upload->store(
                'no_mesin_upload',
                'public'
            );
        }

        return $data = [
            'ktp' => $ktp_path,
            'pajak' => $pajak_path,
            'stnk' => $stnk_path,
            'bpkb' => $bpkb_path,
            'surat_kuasa' => $surat_kuasa_path,
            'no_rangka_upload' => $no_rangka_upload_path,
            'no_mesin_upload' => $no_mesin_upload_path,
            'surat_keterangan' => $surat_keterangan_path,
        ];
    }

    public function uploadPendaftaranBalik($ktp, $pajak, $stnk, $bpkb, $no_rangka_upload, $no_mesin_upload, $surat_keterangan, $kwitansi_pembelian)
    {
        $ktp_path = 'kosong';
        if ($ktp != null) {
            $ktp_path = $ktp->store(
                'ktp',
                'public'
            );
        }

        $pajak_path = 'kosong';
        if ($pajak != null) {
            $pajak_path = $pajak->store(
                'pajak',
                'public'
            );
        }

        $stnk_path = 'kosong';
        if ($stnk != null) {
            $stnk_path = $stnk->store(
                'ktp',
                'public'
            );
        }

        $bpkb_path = 'kosong';
        if ($bpkb != null) {
            $bpkb_path = $bpkb->store(
                'bpkb',
                'public'
            );
        }

        $no_rangka_upload_path = 'kosong';
        if ($no_rangka_upload != null) {
            $no_rangka_upload_path = $no_rangka_upload->store(
                'no_rangka_upload',
                'public'
            );
        }

        $no_mesin_upload_path = 'kosong';
        if ($no_mesin_upload != null) {
            $no_mesin_upload_path = $no_mesin_upload->store(
                'no_mesin_upload',
                'public'
            );
        }

        $surat_keterangan_path = 'kosong';
        if ($surat_keterangan != null) {
            $surat_keterangan_path = $surat_keterangan->store(
                'surat_keterangan',
                'public'
            );
        }

        $kwitansi_pembelian_path = 'kosong';
        if ($kwitansi_pembelian != null) {
            $kwitansi_pembelian_path = $kwitansi_pembelian->store(
                'kwitansi_pembelian',
                'public'
            );
        }

        return $data = [
            'ktp' => $ktp_path,
            'pajak' => $pajak_path,
            'stnk' => $stnk_path,
            'bpkb' => $bpkb_path,
            'no_rangka_upload' => $no_rangka_upload_path,
            'no_mesin_upload' => $no_mesin_upload_path,
            'surat_keterangan' => $surat_keterangan_path,
            'kwitansi_pembelian' => $kwitansi_pembelian_path,
        ];
    }

    public function uploadPendaftaranDuplikat($ktp, $pajak, $stnk, $bpkb, $no_rangka_upload, $no_mesin_upload, $surat_keterangan)
    {
        $ktp_path = 'kosong';
        if ($ktp != null) {
            $ktp_path = $ktp->store(
                'ktp',
                'public'
            );
        }

        $pajak_path = 'kosong';
        if ($pajak != null) {
            $pajak_path = $pajak->store(
                'pajak',
                'public'
            );
        }

        $stnk_path = 'kosong';
        if ($stnk != null) {
            $stnk_path = $stnk->store(
                'ktp',
                'public'
            );
        }

        $bpkb_path = 'kosong';
        if ($bpkb != null) {
            $bpkb_path = $bpkb->store(
                'bpkb',
                'public'
            );
        }

        $no_rangka_upload_path = 'kosong';
        if ($no_rangka_upload != null) {
            $no_rangka_upload_path = $no_rangka_upload->store(
                'no_rangka_upload',
                'public'
            );
        }

        $no_mesin_upload_path = 'kosong';
        if ($no_mesin_upload != null) {
            $no_mesin_upload_path = $no_mesin_upload->store(
                'no_mesin_upload',
                'public'
            );
        }

        $surat_keterangan_path = 'kosong';
        if ($surat_keterangan != null) {
            $surat_keterangan_path = $surat_keterangan->store(
                'surat_keterangan',
                'public'
            );
        }

        return $data = [
            'ktp' => $ktp_path,
            'pajak' => $pajak_path,
            'stnk' => $stnk_path,
            'bpkb' => $bpkb_path,
            'no_rangka_upload' => $no_rangka_upload_path,
            'no_mesin_upload' => $no_mesin_upload_path,
            'surat_keterangan' => $surat_keterangan_path,
        ];
    }
}
