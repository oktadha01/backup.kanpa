<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div id="add-marketing" class="row" hidden>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mt-2">
                    <label for="nm-marketing">Nama</label>
                    <div class="form-group">
                        <input type="text" id="nm-marketing" class="form-control" placeholder="Nama ..." autocomplete="off" required="true">
                    </div>
                    <div class="form-group">
                        <label for="pilih-foto-marketing">Foto marketing</label>
                        <div class="input-group">
                            <input type="file" id="file-foto-marketing" class="file-marketing" value="" hidden>
                            <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="nm-foto-marketing">
                            <div class="input-group-append">
                                <button type="button" id="" class="pilih-marketing browse btn btn-dark">Pilih Gambar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pilih-foto-marketing-header">Foto header</label>
                        <div class="input-group">
                            <input type="file" id="file-foto-marketing-header" class="file-marketing-header" value="" hidden>
                            <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="nm-foto-marketing-header">
                            <div class="input-group-append">
                                <button type="button" id="" class="pilih-marketing-header browse btn btn-dark">Pilih Gambar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 pt-4">
                    <div class="row">
                        <div class="col-lg-6 col-12 pt-4">
                            <div class="form-group">
                                <img src="" id="preview-foto-marketing" class="pilih-marketing img-thumbnail img-fluid">
                                <input type="text" id="foto-lama">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 pt-4">
                            <div class="form-group">
                                <img src="" id="preview-foto-marketing-header" class="pilih-marketing-heaedr img-thumbnail img-fluid">
                                <input type="text" id="foto-lama-header">
                            </div>
                        </div>
                        <div id="ceklis-ubah-marketing" class="form-group" hidden>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-marketing" value="">
                                <label for="ceklis-ubah-foto-marketing" class="custom-control-label">Cheklis untuk mengubah foto</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="add-marketperum" class="row">
            <div class="col">
                <label>Pilih Perumahan</label>
                <select id="marketperum" class="js-states form-control">
                    <?php
                    foreach ($data_perum as $data) :
                    ?>
                        <option value="<?php echo $data->id_perum; ?>"><?php echo $data->nm_perum; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <label for="bitly">Url Bitly</label>
                <div class="form-group">
                    <input type="text" id="bitly" class="form-control" placeholder="Url Bitly ..." autocomplete="off" required="true">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <a href="#main">
                    <button type="button" id="btn-batal-marketing" class="btn btn-sm btn-outline-danger" hidden><i class="fa-solid fa-xmark fa-beat"></i> Batal</button>
                </a>
            </div>
            <div class="col-6">
                <a id="herf-simpan" href="#main">
                    <button type="button" id="btn-add-marketing" class="btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-plus fa-beat"></i> Add data marketing</button>
                    <button type="button" id="btn-simpan-marketing" class="btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-regular fa-pen-to-square"></i> Simpan data perum</button>
                </a>
            </div>
        </div>
        <hr>
        <div id="data-perum"></div>
        <hr>
        <div class="row">
            <div class="col">
                <label>Pilih Marketing</label>
                <select id="select-marketing" class="js-states form-control">
                    <?php
                    foreach ($data_marketing as $data) :
                        if ($data->nm_marketing == 'Customer Service') {
                        } else {

                    ?>
                            <option value="<?php echo $data->id_marketing; ?>"><?php echo $data->nm_marketing; ?></option>
                    <?php
                        }
                    endforeach;
                    ?>
                    <option value="0">Others</option>
                </select>
                <div class="form-group">
                    <label for="pilih-foto-st">Foto Serah Terima</label>
                    <div class="input-group">
                        <input type="file" id="file-foto-st" class="file-st" value="" hidden>
                        <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="nm-foto-st">
                        <div class="input-group-append">
                            <button type="button" id="" class="pilih-foto-st browse btn btn-dark">Pilih Gambar</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <img src="" id="preview-foto-st" class="pilih-foto-st img-thumbnail img-fluid" style="max-height: 11rem;">
                    <input type="text" id="foto-lama-st" hidden>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-6">
                <button type="button" id="btn-batal-foto" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-xmark fa-beat"></i> Batal</button>
            </div>
            <div class="col-6">
                <button type="button" id="btn-simpan-foto" class="btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-cloud-arrow-up fa-beat"></i> Simapan foto</button>
            </div>
        </div>
        <div id="data-foto-st" class="card"></div>
    </div>
</main>