<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
          <div class="modal-body">
            <form method="post" id="form-create" action="{{ route('suratkuasa.store') }}" target="_blank"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}">
                <div class="row">
                    <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                        <strong>Pemberi Kuasa</strong>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama1">Nama</label>
                        <input type="text" class="form-control" name="nama1" placeholder="Nama" data-rule="minlen:4" required />
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
                        <input type="date" class="form-control" name="tanggal_lahir1" placeholder="Tanggal Lahir"
                            data-rule="minlen:4" required />
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
                        <input type="text" class="form-control" name="tempat_lahir2" placeholder="Tempat Lahir"
                            data-rule="minlen:4" required />
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="tanggal_lahir2">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir2" placeholder="Tanggal Lahir"
                            data-rule="minlen:4" required />
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="no_hp2">No HP</label>
                        <input type="text" class="form-control" name="no_hp2" placeholder="No HP" data-rule="minlen:4"
                            required />
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="alamat2">Alamat</label>
                        <input type="text" class="form-control" name="alamat2" placeholder="Alamat" data-rule="minlen:4"
                            required />
                    </div>

                    <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                        <strong>Untuk Pembayaran Pajak / Perpanjangan STNK</strong>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama3">Atas Nama</label>
                        <input type="text" class="form-control" name="nama3" placeholder="Atas Nama" data-rule="minlen:4"
                            required />
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="nopol">Nopol</label>
                        <input type="text" class="form-control" name="nopol" placeholder="Nopol" data-rule="minlen:4"
                            required />
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="merk">Merk / Tipe</label>
                        <input type="text" class="form-control" name="merk" placeholder="Merk / Tipe" data-rule="minlen:4"
                            required />
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="no_rangka">No Rangka</label>
                        <input type="text" class="form-control" name="no_rangka" placeholder="No Rangka" data-rule="minlen:4"
                            required />
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="no_mesin">No Mesin</label>
                        <input type="text" class="form-control" name="no_mesin" placeholder="No Mesin" data-rule="minlen:4"
                            required />
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
                <form method="post" id="form-edit" action="{{ route('suratkuasa.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                            <strong>Pemberi Kuasa</strong>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama1">Nama</label>
                            <input type="text" class="form-control" name="nama1" placeholder="Nama" id="nama1Edit" data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no1">Tanda Pengenal (No. SIM/KTP)</label>
                            <input type="text" class="form-control" name="no1" id="no1Edit" placeholder="Tanda Pengenal " data-rule="minlen:4"
                                onkeypress="return hanyaAngka(event)" maxlength="20" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tempat_lahir1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir1" id="tempat_lahir1Edit" placeholder="Tempat Lahir" data-rule="minlen:4"
                                required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="tanggal_lahir1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir1" id="tanggal_lahir1Edit" placeholder="Tanggal Lahir" data-rule="minlen:4"
                                required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp1">No HP</label>
                            <input type="text" class="form-control" name="no_hp1" id="no_hp1Edit" placeholder="No HP" data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="alamat1">Alamat</label>
                            <input type="text" class="form-control" name="alamat1" id="alamat1Edit" placeholder="Alamat" data-rule="minlen:4" required />
                        </div>

                        <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                            <strong>Penerima Kuasa</strong>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama2">Nama</label>
                            <input type="text" class="form-control" name="nama2" id="nama2Edit" placeholder="Nama" data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no2">Tanda Pengenal (No. SIM/KTP)</label>
                            <input type="text" class="form-control" name="no2" id="no2Edit" placeholder="Tanda Pengenal " data-rule="minlen:4"
                                onkeypress="return hanyaAngka(event)" maxlength="20" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tempat_lahir2">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir2" id="tempat_lahir2Edit" placeholder="Tempat Lahir" data-rule="minlen:4"
                                required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="tanggal_lahir2">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir2" id="tanggal_lahir2Edit" placeholder="Tanggal Lahir" data-rule="minlen:4"
                                required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp2">No HP</label>
                            <input type="text" class="form-control" name="no_hp2" id="no_hp2Edit" placeholder="No HP" data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="alamat2">Alamat</label>
                            <input type="text" class="form-control" name="alamat2" id="alamat2Edit" placeholder="Alamat" data-rule="minlen:4" required />
                        </div>

                        <div class="alert alert-info bg-info text-white col-lg-12 text-center" role="alert">
                            <strong>Untuk Pembayaran Pajak / Perpanjangan STNK</strong>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama3">Atas Nama</label>
                            <input type="text" class="form-control" name="nama3" id="nama3Edit" placeholder="Atas Nama" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="nopol">Nopol</label>
                            <input type="text" class="form-control" name="nopol" id="nopolEdit" placeholder="Nopol" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="merk">Merk / Tipe</label>
                            <input type="text" class="form-control" name="merk" id="merkEdit" placeholder="Merk / Tipe" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_rangka">No Rangka</label>
                            <input type="text" class="form-control" name="no_rangka" id="no_rangkaEdit" placeholder="No Rangka" data-rule="minlen:4"
                                required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_mesin">No Mesin</label>
                            <input type="text" class="form-control" name="no_mesin" id="no_mesinEdit" placeholder="No Mesin" data-rule="minlen:4" required />
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
{{--
<div class="modal fade" role="dialog" id="modal-create-kuasa">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('suratkuasa.store') }}" target="_blank"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}">
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
</div>  --}}
