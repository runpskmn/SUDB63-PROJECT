<?php 
  $sql = "SELECT * FROM room WHERE Room_remark = 0";
  $sql2 = "SELECT * FROM room WHERE Room_remark = 0";
  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);
?>
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
          <h2>Reservation</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
        <form method="post" action="?p=reservdetail">
        <table width="100%">
          <tr>
            <th>Adult</th>
            <th>Children</th>
            <th>Checkin date</th>
            <th>Checkout date</th>
            <th>Room Number</th>
          </tr>
          <tr>
            <th><input type="number"  class="form-control" name="adult"  id="subject" aria-describedby="" placeholder="" required value ="1"></th>
            <th><input type="number" class="form-control" name="children" aria-describedby="" placeholder="" required value ="0"></th>
            <th><input type="date" class="form-control" name="checkin" aria-describedby="" placeholder="" required></th>
            <th><input type="date" class="form-control" name="checkout" aria-describedby="" placeholder="" required></th>
            <th><select  class="form-control" name="roomnum" required>
              <option value="">Select room number</option>
              <?php while($row = $result->fetch_array()) { ?>
                <option value="<?php echo $row["Room_id"];?>"><?php echo $row["Room_id"];?></option>\
                <?php } ?>  
              </select></th>
              <th><button type="submit" name="button" class="btn btn-warning" value="สมัครสมาชิก" ><i class="icon-ok icon-white"></i>Reserv</button></th>
          </tr>
        </table>
        </form>
          <p> </p>
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Standard">Standard</li>
              <li data-filter=".filter-Deluxe">Deluxe</li>
              <li data-filter=".filter-Suite">Suite</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" method='post'>
        <?php 
          while($row = $result2->fetch_assoc()) {
            if($row["Room_type"] == "STD"){
              $type = "Standard";
              $pic = "assets/img/rooms/RoomStd01.jpg";
            }else if($row["Room_type"] == "DEL"){
              $type = "Deluxe";
              $pic = "assets/img/rooms/RoomDlx01.jpg";
            }else if($row["Room_type"] == "SUI"){
              $type = "Suite";
              $pic = "assets/img/rooms/RoomSui01.jpg";
            }
            if($row["Room_remark"] == 0){  
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $type; ?>">
            <div class="portfolio-wrap">
              <img src="<?php echo $pic; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $row["Room_id"]; ?></h4>
                <p><?php echo $type; ?></p>
                <p><?php echo $row["Room_price"]; echo " THB"; ?></p>
                <div class="portfolio-links">
                  <a href="<?php echo $pic; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row["Room_id"]; ?>"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php }}?>

          
        </div>

      </div>
    </section><!-- End Portfolio Section -->
