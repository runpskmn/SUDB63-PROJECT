

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Logout</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li>Logout</li>
          </ol>
        </div>
            <?php
            session_start();
            session_destroy();
            echo '<div class="alert alert-danger"> Logout successful!!</div>'."<meta http-equiv='refresh' content='2 ;url=./?p=home'>";	
            echo $credit;
            ?>
      </div>
    </section><!-- End Breadcrumbs -->

   