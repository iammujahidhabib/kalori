<?php $this->load->view('template/header'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ======= Hero Section ======= -->
<section id="hero">
	<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

		<div class="carousel-inner" role="listbox">

			<!-- Slide 1 -->
			<div class="carousel-item active" style="background-image: url(<?= base_url() ?>asset/corporate/assets/img/slide/slide-1.jpg);">
				<div class="carousel-container">
					<div class="carousel-content animate__animated animate__fadeInUp">
						<h2>Daftar <span>Makan Sehat</span> Sebagai Katering</h2>
						<form method="POST" action="<?= site_url('login/register_vendor') ?>">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" name="nama_vendor" class="form-control" id="nama">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="phone_number">Nomor Telpon</label>
									<input type="text" name="phone_number" class="form-control" id="phone_number">
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" id="alamat" required class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi" id="deskripsi" required class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="foto">Foto</label>
									<input type="file" name="foto" class="form-control" id="foto">
								</div>
							</div>
						</div>
							<button type="submit" class="btn btn-primary">Daftar</button>
							<a class="btn btn-secondary float-right" href="<?= site_url('login/register') ?>">Daftar sebagai Customer</a>
						</form>
					</div>
				</div>
			</div>

		</div>

		<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>

		<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>

		<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

	</div>
</section><!-- End Hero -->
<?php $this->load->view('template/footer'); ?>