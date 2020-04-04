<?php
 //cart.php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "childcare");
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Centers Near You</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <link href="css/gradient4.css" rel="stylesheet" type="text/css">
      </head>
      <body>
        <button class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
           <br />
           <div class="container" style="width:800px;">
                <?php
                if(isset($_POST["place_order"]))
                {
                    //Actioned here time:2:01am;
                     $guardianId= $_SESSION["GuardianId"];
                     $insert_order = "
                     INSERT INTO booking(guardian_id, creation_date, booking_status)
                     VALUES($guardianId, '".date('Y-m-d')."', 'pending')
                     ";
                     $booking_id = "";
                     if(mysqli_query($connect, $insert_order))
                     {
                          $booking_id = mysqli_insert_id($connect);
                     }
                     $_SESSION["booking_id"] = $booking_id;
                     $order_details = "";
                     foreach($_SESSION["childcare"] as $keys => $values)
                     {
                          $order_details .= "
                          INSERT INTO booking_details(booking_id, center_name, charge_per_hr, hours)
                          VALUES('".$booking_id."', '".$values["cenname"]."', '".$values["charge_per_hr"]."', '".$values["hours"]."');
                          ";
                     }
                     if(mysqli_multi_query($connect, $order_details))
                     {
                          unset($_SESSION["childcare"]);
                          echo '<script>alert("You have successfully placed the booking...Thank you")</script>';
                          echo '<script>window.location.href="front_p_cart.php"</script>';
                     }
                }
                if(isset($_SESSION["booking_id"]))
                {
                     $customer_details = '';
                     $order_details = '';
                     $total = 0;
                     $query = '
                     SELECT * FROM booking
                     INNER JOIN booking_details
                     ON booking_details.booking_id = booking.booking_id
                     INNER JOIN guardian
                     ON guardian.GuardianId = booking.guardian_id
                     WHERE booking.booking_id = "'.$_SESSION["booking_id"].'"
                     ';
                     $result = mysqli_query($connect, $query);
                     while($row = mysqli_fetch_array($result))
                     {
                          $customer_details = '
                          <label>'.$row["GuardianUsername"].'</label>
                          <p>'.$row["email"].'</p>
                          ';
                          $order_details .= "
                               <tr>
                                    <td>".$row["center_name"]."</td>
                                    <td>".$row["hours"]."</td>
                                    <td>".$row["charge_per_hr"]."</td>
                                    <td>".number_format($row["hours"] * $row["charge_per_hr"], 2)."</td>
                               </tr>
                          ";
                          $total = $total + ($row["hours"] * $row["charge_per_hr"]);
                     }
                     echo '
                     <h3 align="center">Order Summary for Order No.'.$_SESSION["booking_id"].'</h3>
                     <div class="table-responsive">
                          <table class="table">
                               <tr>
                                    <td><label>Customer Details</label></td>
                               </tr>
                               <tr>
                                    <td>'.$customer_details.'</td>
                               </tr>
                               <tr>
                                    <td><label>Booking Details</label></td>
                               </tr>
                               <tr>
                                    <td>
                                         <table class="table table-bordered">
                                              <tr>
                                                   <th width="50%">Center Name</th>
                                                   <th width="15%">Estimated Hours To Serve</th>
                                                   <th width="15%">Price/hr</th>
                                                   <th width="20%">Total</th>
                                              </tr>
                                              '.$order_details.'
                                              <tr>
                                                   <td colspan="3" align="right"><label>Total</label></td>
                                                   <td>'.number_format($total, 2).'</td>
                                              </tr>
                                         </table>
                                    </td>
                               </tr>
                          </table>
                     </div>
                     ';
                }
                ?>
           </div>
      </body>
 </html>
