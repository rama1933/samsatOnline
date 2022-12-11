<div class="modal fade" role="dialog" id="modal-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-primary">
                <h5 class="modal-title mb-2">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-create" action="{{ route('pendaftaranfisik.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}"> --}}
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="biodata_id" value="{{ auth()->user()->biodata_id }}">

                        <div class="form-group col-lg-12">
                            <label for="tempat">UPPD <small class="text-danger">*</small></label>
                            <select name="tempat" id="tempat" class="form-control" required>
                                <option value="">UPPD</option>
                                <option value="BANJARMASIN 1">BANJARMASIN 1</option>
                                <option value="BANJARMASIN 2">BANJARMASIN 2</option>
                                <option value="BANJARBARU">BANJARBARU</option>
                                <option value="PELAIHARI">PELAIHARI</option>
                                <option value="KOTABARU">KOTABARU</option>
                                <option value="MARTAPURA">MARTAPURA</option>
                                <option value="MARABAHAN">MARABAHAN</option>
                                <option value="BATULICIN">BATULICIN</option>
                                <option value="RANTAU">RANTAU</option>
                                <option value="BARABAI">BARABAI</option>
                                <option value="PARINGIN">PARINGIN</option>
                                <option value="TANJUNG">TANJUNG</option>
                                <option value="AMUNTAI">AMUNTAI</option>
                                <option value="KANDANGAN">KANDANGAN</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="nopol">No Polisi</label>
                            <input type="text" class="form-control" name="nopol" placeholder="No Polisi "
                                data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_rangka">No Rangka</label>
                            <input type="text" class="form-control" name="no_rangka" placeholder="No Rangka "
                                data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_mesin">No Mesin</label>
                            <input type="text" class="form-control" name="no_mesin" placeholder="No Mesin"
                                data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="file">Berkas</label>
                            <input type="file" class="form-control" name="file" required />
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
                <form method="post" id="form-edit" action="{{ route('pendaftaranfisik.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="tempat">UPPD <small class="text-danger">*</small></label>
                            <select name="tempat" id="tempatEdit" class="form-control" required>
                                <option value="BANJARMASIN 1">BANJARMASIN 1</option>
                                <option value="BANJARMASIN 2">BANJARMASIN 2</option>
                                <option value="BANJARBARU">BANJARBARU</option>
                                <option value="PELAIHARI">PELAIHARI</option>
                                <option value="KOTABARU">KOTABARU</option>
                                <option value="MARTAPURA">MARTAPURA</option>
                                <option value="MARABAHAN">MARABAHAN</option>
                                <option value="BATULICIN">BATULICIN</option>
                                <option value="RANTAU">RANTAU</option>
                                <option value="BARABAI">BARABAI</option>
                                <option value="PARINGIN">PARINGIN</option>
                                <option value="TANJUNG">TANJUNG</option>
                                <option value="AMUNTAI">AMUNTAI</option>
                                <option value="KANDANGAN">KANDANGAN</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nopol">No Polisi</label>
                            <input type="text" class="form-control" id="nopolEdit" name="nopol"
                                placeholder="No Polisi " data-rule="minlen:4" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_rangka">No Rangka</label>
                            <input type="text" class="form-control" id="norangkaEdit" name="no_rangka"
                                placeholder="No Rangka " data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="no_mesin">No Mesin</label>
                            <input type="text" class="form-control" id="nomesinEdit" name="no_mesin"
                                placeholder="No Mesin" data-rule="minlen:4" required />
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="file">Berkas</label>
                            <input type="file" id="fileEdit" class="form-control" name="file" />
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
