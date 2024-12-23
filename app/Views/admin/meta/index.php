<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>


<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Meta</h1>
            </div>
            </br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?php echo base_url() . "admin/meta/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Meta</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">Nama Halaman</th>
                                        <th class="text-center" valign="middle">Meta Title (Id)</th>
                                        <th class="text-center" valign="middle">Meta Deskripsi (Id)</th>
                                        <th class="text-center" valign="middle">Meta Title (En)</th>
                                        <th class="text-center" valign="middle">Meta Deskripsi (En)</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($all_data_meta as $tampilMeta) : ?>
                                        <tr>
                                            <td><?= $tampilMeta['nama_halaman'] ?></td>
                                            <td><?= $tampilMeta['meta_title_id'] ?></td>
                                            <td><?= $tampilMeta['meta_description_id'] ?></td>
                                            <td><?= $tampilMeta['meta_title_en'] ?></td>
                                            <td><?= $tampilMeta['meta_description_en'] ?></td>
                                            <td valign="middle">
                                                <div class="d-grid gap-2">
                                                    <!--<a href="<?= base_url('admin/meta/delete') . '/' . $tampilMeta['id_seo'] ?>" class="btn btn-danger">Hapus</a>-->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $tampilMeta['id_seo'] ?>">
                                                        Hapus
                                                    </button>
                                                    <a href="<?= base_url('admin/meta/edit') . '/' . $tampilMeta['id_seo'] ?>" class="btn btn-primary">Ubah</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<!-- Modal Konfirmasi Hapus -->
<?php foreach ($all_data_meta as $meta) : ?>
    <div class="modal fade" id="deleteModal<?= $meta['id_seo'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('admin/meta/delete') . '/' . $meta['id_seo'] ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection('content') ?>