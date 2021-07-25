<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Hotel Reservation</h1>
      <?php if (!isset($_SESSION['login_true'])) { ?>
        <a href="?p=register" class="btn-get-started scrollto">Register</a>
      <?php }else {?>
        <a href="?p=reserv" class="btn-get-started scrollto">Reservation</a>
      <?php }?>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    

    