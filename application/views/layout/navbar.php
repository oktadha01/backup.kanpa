<header id="header" class="header fixed-top" data-scrollto-offset="0" style="max-height: 67px !important;">
   <div id="navbar-top" class="container-fluid d-flex align-items-center justify-content-between pr-var">

      <a href="<?php echo base_url(); ?>#home" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <!-- <i class="fa-brands fa-instagram" style="color: #00000085;font-size: 35px;"></i> --> 
         <img src="<?php echo base_url('assets'); ?>/img/Logo PT Fix Bingit.png" class="" alt="" style="max-height: 30px;">
      </a>
      <a href="<?php echo base_url(); ?>#home" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <!-- Uncomment the line below if you also wish to use an image logo -->
         <!-- <img src="assets/img/logo.png" alt=""> -->
         <h1 class="mb-0 font-size-nav-baro text-kanzu-header">KANZU PERMAI ABADI</h1>
      </a>

      <nav id="navbar" class="navbar">
         <ul>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#home">Home</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#about">Tentang kami</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Perumahan'); ?>#produk">Perumahan</a></li>
            <li><a id="btn-menu-news" class="nav-link scrollto" href="<?php echo base_url('Artikel'); ?>#berita">Artikel</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Estimasi_harga'); ?>#estimasi-hrg" hidden>Price Estimation</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('More_info'); ?>#more-info">Kontak</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

   </div>
   <?php if (!$this->session->userdata('is_login')) : ?>
   <?php else : ?>
      <?php if ($this->session->userdata("privilage") == 'Admin') { ?>

         <aside class="sidebar mt-15px">
            <nav id="navbar">
               <ul class="sidebar__nav">
                  <li>
                     <a href="<?php echo base_url('Perum'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-house"></i>
                        <span class="sidebar__nav__text">Perumahan</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Fasilitas'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-house-medical"></i>
                        <span class="sidebar__nav__text">Fasilitas</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Lokasi_terdekat'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-street-view"></i>
                        <span class="sidebar__nav__text">Lokasi Terdekat</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Tipe'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-sitemap"></i>
                        <span class="sidebar__nav__text">Tipe Rumah</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Foto'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-regular fa-images"></i>
                        <span class="sidebar__nav__text">Foto Rumah</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Marketing'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-people-roof"></i>
                        <span class="sidebar__nav__text">Marketing</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Berita'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-regular fa-newspaper"></i>
                        <span class="sidebar__nav__text">Berita</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Voucher'); ?>" class="sidebar__nav__link">
                     <i class="side-icon-side fa-solid fa-receipt"></i>
                        <span class="sidebar__nav__text">Voucher</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('logout'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-right-from-bracket"></i>
                        <span class="sidebar__nav__text">Logout || <?= $this->session->userdata("privilage"); ?></span>
                     </a>
                  </li>
               </ul>
            </nav>
         </aside>
      <?php
      } ?>
   <?php endif ?>
</header><!-- End Header -->