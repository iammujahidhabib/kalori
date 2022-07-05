<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <!-- <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div> -->
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Transaksi Bulan ini</h3>
                    </div>
                    <div class="card-body">
                        <h2><?= $total->total ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu Terlaris</h3>
                    </div>
                    <div class="card-body">
                        <table class="table small table-bordered">
                            <thead>
                                <tr>
                                    <td>Nama Menu</td>
                                    <td>Jumlah</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menu as $key) { ?>
                                    <tr>
                                        <td><?= $key->nama ?></td>
                                        <td><?= $key->total ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Jadwal Pesanan Hari ini</h3>
                    </div>
                    <div class="card-body">

                        <table class="table small table-bordered">
                            <thead>
                                <tr>
                                    <td>Customer</td>
                                    <td>Nama Menu</td>
                                    <td>Nomor Penerima</td>
                                    <td>Alamat Kirim</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $key) { ?>
                                    <tr>
                                        <td><?= $key->nama_customer ?></td>
                                        <td><?= $key->nama ?></td>
                                        <td><?= $key->nomor_penerima ?></td>
                                        <td><?= $key->alamat_kirim ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>