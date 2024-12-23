<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Klien</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/aktivitas/proses_edit/' . $aktivitasData->id_aktivitas) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="id_aktivitas" name="id_aktivitas" value="<?= $aktivitasData->id_aktivitas ?>" hidden>
                                <div class="mb-3">
                                    <label class="form-label">Nama Klien (In) <br><span class="custom-color custom-label">nama Klien hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_aktivitas_in" name="nama_aktivitas_in" value="<?= $aktivitasData->nama_aktivitas_in; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Klien (En) <br><span class="custom-color custom-label">nama Klien hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="nama_aktivitas_en" name="nama_aktivitas_en" value="<?= $aktivitasData->nama_aktivitas_en; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Klien (In)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_aktivitas_in" name="deskripsi_aktivitas_in"><?= $aktivitasData->deskripsi_aktivitas_in; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Klien (En)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_aktivitas_en" name="deskripsi_aktivitas_en"><?= $aktivitasData->deskripsi_aktivitas_en; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Klien</label>
                                    <input type="file" class="form-control" id="foto_aktivitas" name="foto_aktivitas">
                                    <img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $aktivitasData->foto_aktivitas; ?>">
                                    <?= $validation->getError('foto_aktivitas') ?>
                                </div>
                                <p>*Ukuran foto maksimal 572x572 pixels</p>
                                <p>*Foto harus berekstensi jpg/png/jpeg</p>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (ID)</label>
                                    <input type="text" class="form-control" id="meta_title_id" name="meta_title_id" placeholder="Masukkan Meta Title (ID)" value="<?= old('meta_title_id', $aktivitasData->meta_title_id) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (ID)</label>
                                    <input type="text" class="form-control" id="meta_description_id" name="meta_description_id" placeholder="Masukkan Meta Description (ID)" value="<?= old('meta_description_id', $aktivitasData->meta_description_id) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (EN)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" placeholder="Masukkan Meta Title (EN)" value="<?= old('meta_title_en', $aktivitasData->meta_title_en) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (EN)</label>
                                    <input type="text" class="form-control" id="meta_description_en" name="meta_description_en" placeholder="Masukkan Meta Description (EN)" value="<?= old('meta_description_en', $aktivitasData->meta_description_en) ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col">
                                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo session()->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>