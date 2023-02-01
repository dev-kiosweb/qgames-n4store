                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                        	<div class="card">
                        		<div class="card-body">
                        			<h5 class="card-title">Template Whatsapp</h5>
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
                        			<div class="table-responsive">
                        				<table id="my-datatables" class="table border table-striped">
                        					<thead>
                        						<tr>
                        							<th width="10">No</th>
                        							<th>Type</th>
                        							<th width="10">Action</th>
                        						</tr>
                        					</thead>
                        					<tbody>
                                                <?php $no = 1; foreach ($whatsapp as $key => $value): ?>
                        						<tr>
                        							<td><?= $no++; ?></td>
                                                    <td>Order <?= $value['type']; ?></td>
                        							<td style="width: 10;white-space: nowrap;">
                        								<a href="<?= base_url(); ?>/admin/whatsapp/edit/<?= $value['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        								<button onclick="hapus('<?= base_url(); ?>/admin/whatsapp/delete/<?= $value['id']; ?>');" class="btn btn-sm btn-danger">Hapus</button>
                        							</td>
                        						</tr>
                                                <?php endforeach ?>
                        					</tbody>
                        				</table>
                        			</div>
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
                    </script>
                    <?php $this->endSection(); ?>