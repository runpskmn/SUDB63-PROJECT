<?php
    $sql = "SELECT * FROM books JOIN room ON books.Books_id = room.Books_id WHERE UID ='".$dbarr['UID']."'";
    $result = $conn->query($sql);
?>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>History</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li>History</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Reservation history</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="row" data-aos="fade-up" data-aos-delay="200">
        <table width="100%" id="customers">
          <tr>
            <th>Book ID</th>
            <th>Room number</th>
            <th>Room type</th>
            <th>Checkin date</th>
            <th>Checkout date</th>
            <th>Reservation Date</th>
            <th>Price</th>
            <th>Payment</th>
          </tr>
          <?php while($row = $result->fetch_array()) { 
              if($row["Room_type"] == "STD"){
                $type = "Standard";
              }else if($row["Room_type"] == "DEL"){
                $type = "Deluxe";
              }else if($row["Room_type"] == "SUI"){
                $type = "Suite";
              }
              ?>
          <tr>
            <td><a href="?p=booksdetail&id=<?php echo $row["Books_id"] ?>"><?php echo $row["Books_id"] ?></a></td>
            <td><?php echo $row["Room_id"] ?></td>
            <td><?php echo $type ?></td>
            <td><?php echo $row["Check_in"] ?></td>
            <td><?php echo $row["Check_out"] ?></td>      
            <td><?php echo $row["Bookdate"] ?></td> 
            <td><?php echo $row["Deposit"] ?></td>    
            <td><?php if($row["status"] == 0){ ?>
              	<div class="text-center"><a href="?p=payment&booksID=<?php echo $row["Books_id"] ?>" class="btn btn-warning" >Unpaid</a></div>
              <?php }else{ ?>
                <div class="text-center text-success">Paid</div>
              <?php } ?></td>   
          </tr>
	<?php } ?> 
        </table>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
