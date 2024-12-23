<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Blog</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/artikel/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <!-- Input untuk Judul Artikel dalam Bahasa Indonesia -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Blog (In) <br><span class="custom-color custom-label">judul Blog hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" value="<?= old('judul_artikel') ?>">
                                </div>

                                <!-- Input untuk Judul Artikel dalam Bahasa Inggris -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Blog (En) <br><span class="custom-color custom-label">judul Blog hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="judul_artikel_en" name="judul_artikel_en" value="<?= old('judul_artikel_en') ?>">
                                </div>

                                <!-- Input untuk Deskripsi Artikel dalam Bahasa Indonesia -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Blog (In)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_artikel" name="deskripsi_artikel"><?= old('deskripsi_artikel') ?></textarea>
                                </div>

                                <!-- Input untuk Deskripsi Artikel dalam Bahasa Inggris -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Blog (En)</label>
                                    <textarea type="text" class="form-control tiny" id="deskripsi_artikel_en" name="deskripsi_artikel_en"><?= old('deskripsi_artikel_en') ?></textarea>
                                </div>

                                <!-- Input untuk Foto Artikel -->
                                <div class="mb-3">
                                    <label class="form-label">Gambar Blog</label>
                                    <input class="form-control <?= ($validation && $validation->hasError('foto_artikel')) ? 'is-invalid' : '' ?>" type="file" id="foto_artikel" name="foto_artikel">
                                    <?php if ($validation && $validation->hasError('foto_artikel')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto_artikel') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p>*Ukuran gambar maksimal 572x572 pixels</p>
                                <p>*Format gambar harus berekstensi jpg/png/jpeg</p>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (ID)</label>
                                    <input type="text" class="form-control" id="meta_title_id" name="meta_title_id" placeholder="Masukkan Meta Title (ID)" value="<?= old('meta_title_id') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (ID)</label>
                                    <input type="text" class="form-control" id="meta_description_id" name="meta_description_id" placeholder="Masukkan Meta Description (ID)" value="<?= old('meta_description_id') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (EN)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" placeholder="Masukkan Meta Title (EN)" value="<?= old('meta_title_en') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (EN)</label>
                                    <input type="text" class="form-control" id="meta_description_en" name="meta_description_en" placeholder="Masukkan Meta Description (EN)" value="<?= old('meta_description_en') ?>">
                                </div>
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

<?= $this->endSection('content'); ?>