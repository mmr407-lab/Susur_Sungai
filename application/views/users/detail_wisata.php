    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Detail Wisata Susur Sungai</h2>
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
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <?php foreach($detail as $dt) : ?>
                        <h2><b><?php echo $dt->nama_wisata ?></b> <span class="price">Harga: <b>Rp. <?php echo number_format($dt->harga,0,',','.') ?></b></span></h2>
                        <div class="car-preview-crousel">
                            <div class="single-car-preview">
                                <img src="<?php echo base_url('assets/upload/'.$dt->gambar) ?>" alt="JSOFT">
                            </div>
                            <div class="single-car-preview">
                                <img src="<?php echo base_url('assets/upload/'.$dt->gambar) ?>" alt="JSOFT">
                            </div>
                        </div>
                        <div class="car-details-info">
                            <h5><b>Penumpang:</b> maks 15 orang</h5>
                            <p><?php echo $dt->deskripsi ?></p>

                            <div class="technical-info">
	                            <div class="row">
	                                <div class="col-lg-6">
	                                    <div class="tech-info-table">
	                                        <table class="table table-bordered">
	                                            <tr>
	                                                <th>Fasilitas</th>
	                                                <td><?php echo $dt->fasilitas ?></td>
	                                            </tr>
	                                        </table>
	                                    </div>
	                                </div>
	                            </div>
                            </div>

                            <!--<div class="review-area">
                                <h3>Be the first to review “Aston Martin One-77”</h3>
                                <div class="review-star">
                                    <p class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star unmark"></i>
                                        <i class="fa fa-star unmark"></i>
                                    </p>
                                </div>
                                <div class="review-form">
                                    <form action="index.html">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="name-input">
                                                    <input type="text" placeholder="Full Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="email-input">
                                                    <input type="email" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="message-input">
                                            <textarea name="review" cols="30" rows="5" placeholder="Write Your Feedback Here!"></textarea>
                                        </div>

                                        <div class="input-submit">
                                            <button type="submit">Submit</button>
                                            <button type="reset">Clear</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        
                    	<!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>ALAMAT</h3>

                            <div class="sidebar-body">
                                <center><p>Jl. Pangeran No.68, Pangeran, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123</p></center>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
						

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>INFROMASI LANJUT</h3>

                            <div class="sidebar-body">
                                <p><i class="fa fa-mobile"></i> +62 898-1120-898</p>
                                <p><i class="fa fa-clock-o"></i> Senin - Sabtu 09.00 - 17.00 WITA</p></center>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->