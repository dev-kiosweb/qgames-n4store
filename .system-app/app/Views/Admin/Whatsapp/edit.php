                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                        	<div class="card">
                        		<div class="card-body">
                        			<h5 class="card-title">Edit Template</h5>
                                    <?php if (session('success')): ?>
                                    <div class="alert alert-success">
                                        <b>Berhasil</b> <?= session('success'); ?>
                                    </div>
                                    <?php endif ?>
                                    <?php if (session('error')): ?>
                                    <div class="alert alert-danger">
                                        <b>Gagal</b> <?= session('error'); ?>
                                    </div>
                                    <?php endif ?>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label class="col-form-label">Variabel</label>
                                            <ul>
                                                <li>#orderid# Untuk menampilkan order id.</li>
                                                <li>#name# Untuk menampilkan nama pembeli.</li>
                                                <li>#product# Untuk menampilkan nama produk yang dibeli.</li>
                                                <li>#price# Untuk menampilkan harga produk yang dibeli.</li>
                                                <li>#status# Untuk menampilkan statu transaksi.</li>
                                            </ul>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Template</label>
                                            <textarea rows="5" class="form-control" autocomplete="off" name="template" autocomplete="off"><?= $whatsapp['template']; ?></textarea>
                                        </div>
                                        <a href="<?= base_url(); ?>/admin/whatsapp" class="btn btn-warning">Kembali</a>
                                        <div class="float-end">
                                            <button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
                                        </div>
                                    </form>
                        		</div>
                        	</div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <script>
                    	$("#my-datatables").DataTable({
                    		ordering: false,
                    	});
                        $("#check-kostum").on('change', function() {
                            if ($("#check-kostum").prop('checked')) {
                                $("#kostum-price").removeClass('hide');
                            } else {
                                $("#kostum-price").addClass('hide');
                            }
                        })
                    </script>
                    <?php $this->endSection(); ?>