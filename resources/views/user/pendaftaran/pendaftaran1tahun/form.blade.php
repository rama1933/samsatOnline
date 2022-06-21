<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('pendaftaran1tahun.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}"> --}}
                   <div class="row">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}">

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
                <form method="post" id="form-edit" action="{{ route('pendaftaran1tahun.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
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
