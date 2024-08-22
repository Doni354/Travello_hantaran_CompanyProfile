 <!-- Carousel Start -->

 <div class="carousel">
     <div class="container-fluid">
         <div class="owl-carousel">
             <?php foreach ($tbslider as $key => $slider) : ?>
                 <div class="carousel-item">
                     <div class="carousel-img">
                         <img class="lazyload" data-src="asset-user/images/<?= $slider->file_foto_slider;  ?>" <?php foreach ($profil as $perusahaan) :  ?> alt="<?= $perusahaan->nama_perusahaan; ?>" <?php endforeach; ?>>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
 </div>
 <!-- Carousel End -->