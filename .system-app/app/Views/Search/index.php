                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10 col-md-12 text-center">
                            <div class="alert alert-primary">
                                Menampilkan hasil pencarian : <?= $search; ?>
                            </div>
                            <div class="games">
                                <div class="text-center">
                                    <?php foreach ($games as $data_loop): ?>
                                    <a class="of-game" href="<?= base_url(); ?>/buy/games/<?= $data_loop['slug']; ?>">
                                        <?php if (filter_var($data_loop['images'], FILTER_VALIDATE_URL)): ?>
                                        <img src="<?= $data_loop['images']; ?>" alt="" class="w-100">
                                        <?php else: ?>
                                        <img src="<?= base_url(); ?>/assets/images/games/<?= $data_loop['images']; ?>" alt="" class="w-100">
                                        <?php endif ?>

                                        <p class="mb-0 mt-2 text-center"><?= $data_loop['name']; ?></p>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <?php $this->endSection(); ?>