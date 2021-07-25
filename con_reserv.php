<?php 
  date_default_timezone_set('Asia/Bangkok');
  $Today = date("Y-m-d H:i:s"); 
  $bid =  'B'.mt_rand(10000,99999);
  $sql = "SELECT * FROM room WHERE Room_id='".$_POST["roomnumber"]."'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if($row["Room_type"] == "S"){
      $type = "Standard";
  }
  $price = $row["Room_price"]*0.47;
  $vat = $row["Room_price"]*0.035;
?>
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Reservation</h2>
          <ol>
            <li><a href="?p=home">Homeaaaa</a></li>
            <li>Reservation</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Comfirm reservation</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="row" data-aos="fade-up" data-aos-delay="200">
        <?php 
          if ($_POST["button"] == "Confirm"){
            $sql2 = "INSERT INTO books(Books_id,Check_in,Check_out,Bookdate,UID,Deposit) 
                      VALUES('".$bid."','".$_POST["checkin"]."','".$_POST["checkout"]."','$Today','".$dbarr["UID"]."','".$row["Room_price"]*0.5."')";
            if($conn->query($sql2) === TRUE){
              $sql_books = "SELECT * FROM books WHERE UID = '".$dbarr["UID"]."' ORDER BY Books_id DESC LIMIT 1";
              $result = $conn->query($sql_books);
              if($result->num_rows > 0){
                $rowz = $result->fetch_assoc();
                $sql_update = "UPDATE room SET Room_remark = 1 , Books_id = '".$bid."' WHERE Room_id = '".$_POST['roomnumber']."'";
                $conn->query($sql_update);
                for ($x = 1; $x <= $_POST['adult']; $x++) {
                  $fname = "fName" . $x;
                  $lname = "lName" . $x;
                  $sex = "txtSex" . $x;
                  $sql_bkd = "INSERT INTO books_detail(Books_id,First_Name,Last_Name,Age,Sex) VALUES ('".$bid."','".$_POST[$fname]."','".$_POST[$lname]."','Adult','".$_POST[$sex]."')";
                  $conn->query($sql_bkd);
                }
                for ($x = 1; $x <= $_POST['children']; $x++) {
                  $cfname = "cfName" . $x;
                  $clname = "clName" . $x;
                  $csex = "ctxtSex" . $x;
                  $sql_bkd = "INSERT INTO books_detail(Books_id,First_Name,Last_Name,Age,Sex) VALUES('".$bid."','".$_POST[$cfname]."','".$_POST[$clname]."','Children','".$_POST[$csex]."')";
                  $conn->query($sql_bkd);
                }
                echo '<div class="alert alert-success">Reservation successful!!</div>';
              }
            }else{
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        ?>
        <form method="post">
            <input type="hidden"  class="form-control" name="adult"  id="subject" aria-describedby="" placeholder="" required value ="<?php echo $_POST['adult']; ?>">
            <input type="hidden" class="form-control" name="children" aria-describedby="" placeholder="" required value ="<?php echo $_POST['children']; ?>">
            <input type="hidden" class="form-control" name="checkin" aria-describedby="" placeholder="" required value ="<?php echo $_POST['checkin']; ?>">
            <input type="hidden" class="form-control" name="checkout" aria-describedby="" placeholder="" required value ="<?php echo $_POST['checkout']; ?>">
            <input type="hidden" class="form-control" name="roomnumber" aria-describedby="" placeholder="" required value ="<?php echo $_POST['roomnumber']; ?>">
            <p>Booking name : <?php echo $dbarr["First_Name"]." ".$dbarr["Last_Name"] ?></p>
            <p>Email : <?php echo $dbarr["Email"]?></p>
            <p>Tel : <?php echo $dbarr["tel"]?></p>
            <p>=======================================</p>
            <p>Room number : <?php echo $_POST['roomnumber'];?></p>
            <p>Room type : <?php echo $type?></p>
            <p>Checkin date : <?php echo $_POST['checkin'];?></p>
            <p>Checkout date : <?php echo $_POST['checkout'];?></p>
            <p>=======================================</p>
            <p>Adult : <?php echo $_POST['adult'];?>  
                Children : <?php if($_POST['children']==0){
                    $ch = "-";
                }else{
                    $ch = $_POST['children'];
                }
                echo $ch;?></p>
            <?php 
                for ($x = 1; $x <= $_POST['adult']; $x++) {
                    $fname = "fName" . $x;
                    $lname = "lName" . $x;
                    $sex = "txtSex" . $x;
            ?>
            <input type="hidden" class="form-control" name="fName<?php echo $x; ?>" aria-describedby="" placeholder="" required value ="<?php echo $_POST[$fname]; ?>">
            <input type="hidden" class="form-control" name="lName<?php echo $x; ?>" aria-describedby="" placeholder="" required value ="<?php echo $_POST[$lname]; ?>">
            <input type="hidden" class="form-control" name="txtSex<?php echo $x; ?>" aria-describedby="" placeholder="" required value ="<?php echo $_POST[$sex]; ?>">
            <p><b>Adult #<?php echo $x;?></b></p>
            <p>Name : <?php echo  $_POST[$fname]." ".$_POST[$lname]; ?>
            <p>Sex : <?php echo $_POST[$sex]; ?>
            <p>=======================================</p>
            <?php } ?>
            <?php 
                for ($x = 1; $x <= $_POST['children']; $x++) {
                    $fname = "cfName" . $x;
                    $lname = "clName" . $x;
                    $sex = "ctxtSex" . $x;
            ?>
            <input type="hidden" class="form-control" name="cfName<?php echo $x; ?>" aria-describedby="" placeholder="" required value ="<?php echo $_POST[$fname]; ?>">
            <input type="hidden" class="form-control" name="clName<?php echo $x; ?>" aria-describedby="" placeholder="" required value ="<?php echo $_POST[$lname]; ?>">
            <input type="hidden" class="form-control" name="ctxtSex<?php echo $x; ?>" aria-describedby="" placeholder="" required value ="<?php echo $_POST[$sex]; ?>">
            <p><b>Children #<?php echo $x;?></b></p>
            <p>Name : <?php echo  $_POST[$fname]." ".$_POST[$lname]; ?>
            <p>Sex : <?php echo $_POST[$sex]; ?>
            <p>=======================================</p>
            <?php } ?>
            <p>Room price : <?php echo $price ?> </p>
            <p>VAT 7% : <?php echo $vat ?> </p>
            <p>Total price : <?php echo $row["Room_price"]*0.5 ?> </p>
            <p><div class="text-danger">โปรดอ่านก่อนกดยืนยัน : ราคานี้เป็นราคา 50% จากราคาเต็ม อีก 50% ที่เหลือจะจ่ายเมื่อเข้าพักที่โรงแรม</div> </p>
          <p></p>
         <?php if ($_POST["button"] != "Confirm"){ ?>
            <p><button type="submit" name="button" class="btn btn-warning" value="Confirm" ><i class="icon-ok icon-white"></i>Comfirm</button></p>
          <?php }else{ ?>
            <p><a  name="button" class="btn btn-warning" value="pay" href="?p=payment&booksID=<?php echo $bid; ?>"></i>Payment</a> <a class="btn btn-info" href="?p=home" value="Later">Later</a></p>
          <?php } ?>
        </form>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
