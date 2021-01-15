
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay" style="background-image: url(<?php echo base_url().'assets/image/2.jpg' ?>); ">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Daftar Wisata Susur Sungai</h2>
                        <span class="title-line"><i class="fa fa-ship"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                            <!-- Single Car Start -->
                            <?php foreach($wisata as $mb) : ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <img src="<?php echo base_url('assets/upload/'.$mb->gambar) ?>">
                                    <div class="car-list-info without-bar">
                                        <h2><a href="<?php echo base_url('users/data_wisata/detail_wisata/'.$mb->id_wisata) ?>"><?php echo $mb->nama_wisata ?></a></h2>
                                        <h5>Rp. <?php echo number_format($mb->harga,0,',','.') ?> / Paket</h5>
                                        <p><?php echo $mb->deskripsi?></p>
                                        <ul class="car-info-list">
                                            <li><b>Fasilitas : </b><?php echo $mb->fasilitas?></li>
                                        </ul>
                                        <p class="rating"> 
                                            <b>Maks 15 Orang</b>
                                        </p>
                                        <?php
                                            if($mb->status == "1") {
                                                echo anchor('users/pesan/tambah_pesan/'.$mb->id_wisata,'<span class="rent-btn">Pesan</span>');
                                            }else{
                                                echo '<span class="rent-btn">Tidak Tersedia</span>';
                                            }
                                        ?>
                                        <a href="<?php echo base_url('users/data_wisata/detail_wisata/'.$mb->id_wisata) ?>" class="rent-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            <!-- Single Car End -->
                        </div>
                    </div>
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->