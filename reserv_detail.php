
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reservation</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li>Reservation</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Reservation detail</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="row" data-aos="fade-up" data-aos-delay="200">
        <form method="post" action="?p=reservconfirm">
            <input type="hidden"  class="form-control" name="adult"  id="subject" aria-describedby="" placeholder="" required value ="<?php echo $_POST['adult']; ?>">
            <input type="hidden" class="form-control" name="children" aria-describedby="" placeholder="" required value ="<?php echo $_POST['children']; ?>">
            <input type="hidden" class="form-control" name="checkin" aria-describedby="" placeholder="" required value ="<?php echo $_POST['checkin']; ?>">
            <input type="hidden" class="form-control" name="checkout" aria-describedby="" placeholder="" required value ="<?php echo $_POST['checkout']; ?>">
            <input type="hidden" class="form-control" name="roomnumber" aria-describedby="" placeholder="" required value ="<?php echo $_POST['roomnum']; ?>">
        <?php 
          for ($x = 1; $x <= $_POST['adult']; $x++) {
        ?>
         <br>Adult #<?php echo $x; ?></br>
          <table width="100%">
            <tr>
              <th>First name</th>
              <th>Lastname</th>
              <th>Sex</th>
            </tr>
            <tr>
              <th><input type="text"  class="form-control" name="fName<?php echo $x; ?>"  id="subject" aria-describedby="" placeholder="" required></th>
              <th><input type="text" class="form-control" name="lName<?php echo $x; ?>" aria-describedby="" placeholder="" required ></th>
              <th><select  class="form-control" name="txtSex<?php echo $x; ?>">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              </select></th>
            </tr>
          </table>
          <?php } ?>
          <?php 
          for ($x = 1; $x <= $_POST['children']; $x++) {
        ?>
         <br>Children #<?php echo $x; ?></br>
          <table width="100%">
            <tr>
              <th>First name</th>
              <th>Lastname</th>
              <th>Sex</th>
            </tr>
            <tr>
              <th><input type="text"  class="form-control" name="cfName<?php echo $x; ?>"  id="subject" aria-describedby="" placeholder="" required></th>
              <th><input type="text" class="form-control" name="clName<?php echo $x; ?>" aria-describedby="" placeholder="" required ></th>
              <th><select  class="form-control" name="ctxtSex<?php echo $x; ?>">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              </select></th>
            </tr>
          </table>
          <?php } ?>
          <p></p>
          <p><button type="submit" name="button" class="btn btn-warning" value="สมัครสมาชิก" ><i class="icon-ok icon-white"></i>Next</button></p>
        </form>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
