<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= 'https://wa.me' ?>" class="nav-link">Chat Whatsapp</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-envelope-open"></i>

                        <?php $data = $this->m_pesanan_masuk->count_data(); ?>
                        
                        <span class="badge badge-danger navbar-badge"><?= $data; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="dropdown-item">
                            <!-- Message Start -->
                            <?php $pesanan_masuk = $this->m_pesanan_masuk->pesanan(); ?>
                            <?php foreach ($pesanan_masuk as $key => $value) { ?>
                                <div class="media">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value->nama_penerima; ?>
                                        </h3>
                                        <p class="text-sm"><?= $value->no_order; ?></p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= $value->tgl_order; ?></p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            <?php } ?>
                        </a>

                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="dropdown-item dropdown-footer">Lihat Pesanan Masuk</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->