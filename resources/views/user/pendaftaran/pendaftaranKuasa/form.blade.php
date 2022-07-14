<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('pendaftarankuasa.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}"> --}}
                   <div class="row">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}">

                        <div class="form-group col-lg-12">
                            <label for="jenis">Jenis Pendaftaran <small class="text-danger">*</small></label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="">Jenis Pendaftaran</option>
                                <option value="pendaftaran 1 tahun">pendaftaran 1 tahun</option>
                                <option value="pendaftaran 5 tahun">pendaftaran 5 tahun</option>
                                <option value="pendaftaran duplikat">pendaftaran duplikat</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="nopol">No Polisi</label>
                            <input type="text" class="form-control" name="nopol" placeholder="No Polisi " data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_rangka">No Rangka</label>
                            <input type="text" class="form-control" name="no_rangka" placeholder="No Rangka " data-rule="minlen:4"
                                required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_mesin">No Mesin</label>
                            <input type="text" class="form-control" name="no_mesin" placeholder="No Mesin" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" name="merk" placeholder="Merk " data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tahun">Tahun Pembuatan</label>
                            <input type="text" class="form-control" name="tahun" placeholder="Tahun Pembuatan " data-rule="minlen:4"
                                onkeypress="return hanyaAngka(event)" maxlength="4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="no_rangka_upload">Upload No rangka (Apabila pajak 5 tahun / duplikat)</label>
                            <input type="file" class="form-control" name="no_rangka_upload"  />
                        </div>

                         <div class="form-group col-lg-12">
                            <label for="no_mesin_upload">Upload No mesin (Apabila pajak 5 tahun / duplikat)</label>
                            <input type="file" class="form-control" name="no_mesin_upload"  />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="surat_keterangan">Upload Surat Keterangan Hilang (Apabila pajak 5 tahun / duplikat)</label>
                            <input type="file" class="form-control" name="surat_keterangan"  />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="ktp">Upload KTP sesuai Notice Pajak</label>
                            <input type="file" class="form-control" name="ktp" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="pajak">Upload Notice Pajak</label>
                            <input type="file" class="form-control" name="pajak" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="stnk">Upload STNK asli</label>
                            <input type="file" class="form-control" name="stnk" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="bpkb">Upload BPKB halaman 1-4</label>
                            <input type="file" class="form-control" name="bpkb" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="surat_kuasa">Upload Surat Kuasa</label>
                            <input type="file" class="form-control" name="surat_kuasa" required />
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;"
                    disabled>LOADING......</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Edit Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-edit" action="{{ route('pendaftarankuasa.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="jenis">Jenis Pendaftaran <small class="text-danger">*</small></label>
                            <select name="jenis" id="jenisEdit" class="form-control" required>
                                <option value="pendaftaran 1 tahun">pendaftaran 1 tahun</option>
                                <option value="pendaftaran 5 tahun">pendaftaran 5 tahun</option>
                                <option value="pendaftaran duplikat">pendaftaran duplikat</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nopol">No Polisi</label>
                            <input type="text" class="form-control" id="nopolEdit" name="nopol" placeholder="No Polisi " data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_rangka">No Rangka</label>
                            <input type="text" class="form-control" id="norangkaEdit" name="no_rangka" placeholder="No Rangka " data-rule="minlen:4"
                                required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_mesin">No Mesin</label>
                            <input type="text" class="form-control" id="nomesinEdit" name="no_mesin" placeholder="No Mesin" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merkEdit" name="merk" placeholder="Merk " data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="tahun">Tahun Pembuatan</label>
                            <input type="text" class="form-control" id="tahunEdit" name="tahun" placeholder="Tahun Pembuatan " data-rule="minlen:4"
                                onkeypress="return hanyaAngka(event)" maxlength="4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="no_rangka_upload">Upload No rangka (Apabila pajak 5 tahun / duplikat)</label>
                            <input type="file" class="form-control" name="no_rangka_upload" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="no_mesin_upload">Upload No mesin (Apabila pajak 5 tahun / duplikat)</label>
                            <input type="file" class="form-control" name="no_mesin_upload" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="surat_keterangan">Upload Surat Keterangan Hilang (Apabila pajak 5 tahun / duplikat)</label>
                            <input type="file" class="form-control" name="surat_keterangan" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="ktp">Upload KTP sesuai Notice Pajak</label>
                            <input type="file" id="ktpEdit" class="form-control" name="ktp" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="pajak">Upload Notice Pajak</label>
                            <input type="file" id="pajakEdit" class="form-control" name="pajak" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="stnk">Upload STNK asli</label>
                            <input type="file" id="stnkEdit" class="form-control" name="stnk" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="bpkb">Upload BPKB halaman 1-4</label>
                            <input type="file" id="bpkbEdit" class="form-control" name="bpkb" />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="surat_kuasa">Upload Surat Kuasa</label>
                            <input type="file" class="form-control" name="surat_kuasa" />
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;"
                    disabled>LOADING......</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modal-create-kuasa">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('pdf.surat') }}" target="_blank"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}"> --}}
                    <div class="row">
                        <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                            <strong>Pemberi Kuasa</strong>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama1">Nama</label>
                            <input type="text" class="form-control" name="nama1" placeholder="Nama"
                                data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no1">Tanda Pengenal (No. SIM/KTP)</label>
                            <input type="text" class="form-control" name="no1" placeholder="Tanda Pengenal " data-rule="minlen:4"
                                onkeypress="return hanyaAngka(event)" maxlength="20" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tempat_lahir1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir1" placeholder="Tempat Lahir"
                                data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="tanggal_lahir1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir1" placeholder="Tanggal Lahir" data-rule="minlen:4"
                                required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp1">No HP</label>
                            <input type="text" class="form-control" name="no_hp1" placeholder="No HP" data-rule="minlen:4"
                                required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="alamat1">Alamat</label>
                            <input type="text" class="form-control" name="alamat1" placeholder="Alamat" data-rule="minlen:4"
                                required />
                        </div>

                        <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                            <strong>Penerima Kuasa</strong>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama2">Nama</label>
                            <input type="text" class="form-control" name="nama2" placeholder="Nama" data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no2">Tanda Pengenal (No. SIM/KTP)</label>
                            <input type="text" class="form-control" name="no2" placeholder="Tanda Pengenal " data-rule="minlen:4"
                                onkeypress="return hanyaAngka(event)" maxlength="20" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tempat_lahir2">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir2" placeholder="Tempat Lahir" data-rule="minlen:4"
                                required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="tanggal_lahir2">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir2" placeholder="Tanggal Lahir" data-rule="minlen:4"
                                required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp2">No HP</label>
                            <input type="text" class="form-control" name="no_hp2" placeholder="No HP" data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="alamat2">Alamat</label>
                            <input type="text" class="form-control" name="alamat2" placeholder="Alamat" data-rule="minlen:4" required />
                        </div>

                        <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                            <strong>Untuk Pembayaran Pajak / Perpanjangan STNK</strong>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama3">Atas Nama</label>
                            <input type="text" class="form-control" name="nama3" placeholder="Atas Nama" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="nopol">Nopol</label>
                            <input type="text" class="form-control" name="nopol" placeholder="Nopol" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="merk">Merk / Tipe</label>
                            <input type="text" class="form-control" name="merk" placeholder="Merk / Tipe" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_rangka">No Rangka</label>
                            <input type="text" class="form-control" name="no_rangka" placeholder="No Rangka" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_mesin">No Mesin</label>
                            <input type="text" class="form-control" name="no_mesin" placeholder="No Mesin" data-rule="minlen:4" required />
                        </div>


                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" id="tombol" class="btn btn-primary">SIMPAN</button>
                <button type="submit" id="loading" class="btn btn-warning" style="display: none;"
                    disabled>LOADING......</button>
            </div>
            </form>
        </div>
    </div>
</div>
