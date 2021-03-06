   <main id="main">
       <!-- ======= Contact Section ======= -->
       <section id="contact" class="contact">
           <div class="container" data-aos="fade-up">

               <div class="section-title">
                   <h2>Kontak</h2>
                   <h3>Hubungi Kami</h3>
                   <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
               </div>

               <div class="row" data-aos="fade-up" data-aos-delay="100">
                   <div class="col-lg-6">
                       <div class="info-box mb-4">
                           <i class="bx bx-map"></i>
                           <h3>Alamat</h3>
                           <p><?= $profile->alamat ?></p>
                       </div>
                   </div>

                   <div class="col-lg-3 col-md-6">
                       <div class="info-box  mb-4">
                           <i class="bx bx-envelope"></i>
                           <h3>Email</h3>
                           <p><a target="_blank" href="mailto:<?= $profile->email ?>"><?= $profile->email ?></a></p>
                       </div>
                   </div>

                   <div class="col-lg-3 col-md-6">
                       <div class="info-box  mb-4">
                           <i class="bx bx-phone-call"></i>
                           <h3>Telpon</h3>
                           <p><a href="https://wa.me/<?= $profile->phone ?>" target="_blank"><?= $profile->phone ?></a></p>
                           <!-- <p>+1 5589 55488 55</p> -->
                       </div>
                   </div>

               </div>

               <div class="row" data-aos="fade-up" data-aos-delay="100">

                   <div class="col-lg-6 ">
                       <?=$profile->maps?>
                       <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
                   </div>

                   <div class="col-lg-6">
                       <form action="<?= site_url() ?>home/mail" method="post" role="form" class="php-email-form">
                           <div class="row">
                               <div class="col form-group">
                                   <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                               </div>
                               <div class="col form-group">
                                   <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                               </div>
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                           </div>
                           <div class="form-group">
                               <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                           </div>
                           <div class="my-3">
                               <div class="loading">Loading</div>
                               <div class="error-message"></div>
                               <div class="sent-message">Your message has been sent. Thank you!</div>
                           </div>
                           <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                       </form>
                   </div>

               </div>

           </div>
       </section><!-- End Contact Section -->

   </main><!-- End #main -->