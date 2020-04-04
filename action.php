<?php
 //action.php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "childcare");
 if(isset($_POST["product_id"]))
 {
      $order_table = '';
      $message = '';
      if($_POST["action"] == "add")
      {
           if(isset($_SESSION["childcare"]))
           {
                $is_available = 0;
                foreach($_SESSION["childcare"] as $keys => $values)
                {
                     if($_SESSION["childcare"][$keys]['product_id'] == $_POST["product_id"])
                     {
                          $is_available++;
                          $_SESSION["childcare"][$keys]['hours'] = $_SESSION["childcare"][$keys]['hours'] + $_POST["hours"];
                     }
                }
                if($is_available < 1)
                {
                     $item_array = array(
                          'product_id'               =>     $_POST["product_id"],
                          'cenname'               =>     $_POST["cenname"],
                          'charge_per_hr'               =>     $_POST["charge_per_hr"],
                          'hours'          =>     $_POST["hours"]
                     );
                     $_SESSION["childcare"][] = $item_array;
                }
           }
           else
           {
                $item_array = array(
                     'product_id'               =>     $_POST["product_id"],
                     'cenname'               =>     $_POST["cenname"],
                     'charge_per_hr'               =>     $_POST["charge_per_hr"],
                     'hours'          =>     $_POST["hours"]
                );
                $_SESSION["childcare"][] = $item_array;
           }
      }
      if($_POST["action"] == "remove")
      {
           foreach($_SESSION["childcare"] as $keys => $values)
           {
                if($values["product_id"] == $_POST["product_id"])
                {
                     unset($_SESSION["childcare"][$keys]);
                     $message = '<label class="text-success">Product Removed</label>';
                }
           }
      }
      if($_POST["action"] == "quantity_change")
      {
           foreach($_SESSION["childcare"] as $keys => $values)
           {
                if($_SESSION["childcare"][$keys]['product_id'] == $_POST["product_id"])
                {
                     $_SESSION["childcare"][$keys]['hours'] = $_POST["quantity"];
                }
           }
      }
      $order_table .= '
           '.$message.'
           <table class="table table-bordered">
                <tr>
                     <th width="40%">Product Name</th>
                     <th width="10%">Quantity</th>
                     <th width="20%">Price</th>
                     <th width="15%">Total</th>
                     <th width="5%">Action</th>
                </tr>
           ';
      if(!empty($_SESSION["childcare"]))
      {
           $total = 0;
           foreach($_SESSION["childcare"] as $keys => $values)
           {
                $order_table .= '
                     <tr>
                          <td>'.$values["cenname"].'</td>
                          <td><input type="text" name="quantity[]" id="quantity'.$values["product_id"].'" value="'.$values["hours"].'" class="form-control quantity" data-product_id="'.$values["product_id"].'" /></td>
                          <td align="right">$ '.$values["charge_per_hr"].'</td>
                          <td align="right">$ '.number_format($values["hours"] * $values["charge_per_hr"], 2).'</td>
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remove</button></td>
                     </tr>
                ';
                $total = $total + ($values["hours"] * $values["charge_per_hr"]);
           }
           $order_table .= '
                <tr>
                     <td colspan="3" align="right">Total</td>
                     <td align="right">$ '.number_format($total, 2).'</td>
                     <td></td>
                </tr>
                <tr>
                     <td colspan="5" align="center">
                          <form method="post" action="front_p_cart.php">
                               <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />
                          </form>
                     </td>
                </tr>
           ';
      }
      $order_table .= '</table>';
      $output = array(
           'order_table'     =>     $order_table,
           'cart_item'          =>     count($_SESSION["childcare"])
      );
      echo json_encode($output);
 }
 ?>
