<?php
include('db.php');

if(isset($_POST['action'])){
    $query = "SELECT * FROM product WHERE product_status = '1'";
    if(isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])){
        $query .= " AND product_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
    }

    if(isset($_POST["brand"])){
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= " AND product_brand IN ('" . $brand_filter . "')";
    }

    if(isset($_POST['ram'])){
        $ram_filter = implode("','", $_POST["ram"]);
        $query .= " AND product_ram IN ('" . $ram_filter . "')";
    }

    if(isset($_POST['storage'])){
        $storage_filter = implode("','", $_POST["storage"]);
        $query .= " AND product_storage IN ('" . $storage_filter . "')";
    }

    $results = $connect->query($query);
    $total_rows = $results->rowCount();
    $output = "";
    if($total_rows > 0) {
        $output .= "<div class='row'>";
        foreach($results as $row){
            $output .= 
            '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../images/' . $row['product_image'] .'" alt="Product Image"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">' . $row['product_name'] . '</a>
                </h4>
                <h5>R' . $row['product_price'] . '</h5>
                <p class="card-text">Camera: ' . $row['product_camera'] . ' MP <br> 
                Brand: ' . $row['product_brand'] . ' <br> 
                RAM: ' . $row['product_ram'] . ' GB <br> 
                Storage: ' . $row['product_storage'] . ' GB <br> 
                </p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>';
        }
        $output .= "</div>";
    }else {
        $output .= '<div class="col-lg-4 col-md-6 mb-4"><h2>No data found</h2></div>';
    }

    echo $output;
}


// code to perform CRUD operations 
if(isset($_POST["fetchData"])){
  $query = "SELECT * FROM product";
  $rows = $connect->query($query);
  echo "<div class='row'>
    <table class='table table-light table-bordered'>
      <thead class='thead-light'>
          <tr>
              <th width='10%'>ID</th>
              <th width='10%'>Name</th>
              <th width='10%'>Brand</th>
              <th width='10%'>Price</th>
              <th width='10%'>RAM</th>
              <th width='10%'>Storage</th>
              <th width='10%'>Camera</th>
              <th width='10%'>Image</th>
              <th width='10%'>Quantity</th>
              <th width='10%'>Status</th>
              <th width='10%'>&nbsp;</th>
          </tr>
      </thead>
      <tbody>";

      if($rows->rowCount() > 0){
        foreach($rows as $row){
          $product_id = $row["product_id"];
          $product_name = $row["product_name"];
          $product_brand = $row["product_brand"];
          $product_price = $row["product_price"];
          $product_ram = $row["product_ram"];
          $product_storage = $row["product_storage"];
          $product_camera = $row["product_camera"];
          $product_image = $row["product_image"];
          $product_quantity = $row["product_quantity"];
          $product_status = $row["product_status"];

          echo "<tr>
          <td>$product_id</td>
          <td class='product_name' data-id1='$product_id' contenteditable>$product_name</td>
          <td class='product_brand' data-id2='$product_id' contenteditable>$product_brand</td>
          <td class='product_price' data-id3='$product_id' contenteditable>$product_price</td>
          <td class='product_ram' data-id4='$product_id' contenteditable>$product_ram</td>
          <td class='product_storage' data-id5='$product_id' contenteditable>$product_storage</td>
          <td class='product_camera' data-id6='$product_id' contenteditable>$product_camera</td>
          <td class='product_image' data-id7='$product_id' contenteditable><img src='../images/$product_image' width='50' height='60' ></td>
          <td class='product_quantity' data-id8='$product_id' contenteditable>$product_quantity</td>
          <td class='product_status' data-id9='$product_id' contenteditable>$product_status</td>
          <td><button class='btn btn-danger btn_delete' name='btn_delete' id='btn_delete' data-id10='$product_id'>x</button></td>
          </tr>";
        }
        // row to insert new data 
        echo "<tr>
          <td></td>
          <td id='product_name' contenteditable></td>
          <td id='product_brand' contenteditable></td>
          <td id='product_price' contenteditable></td>
          <td id='product_ram' contenteditable></td>
          <td id='product_storage' contenteditable></td>
          <td id='product_camera' contenteditable></td>
          <td id='product_image' contenteditable></td>
          <td id='product_quantity' contenteditable></td>
          <td id='product_status' contenteditable></td>
          <td><button class='btn btn-success' name='btn_add' id='btn_add'>+</button></td>
          </tr>";

      }else{
        echo "<tr><td colspan='10'>No product found</td></td>";
      }

      echo "</tbody>
      <tfoot>
          <tr>
              <th colspan='11'>Add, edit and update product</th>
          </tr>
      </tfoot>
  </table>
</div>";

}

if(isset($_POST["addData"])){
  // get data which is not from a form 
  $product_name = $_POST["product_name"];
  $product_brand = $_POST["product_brand"];
  $product_price = $_POST["product_price"];
  $product_ram = $_POST["product_ram"];
  $product_storage = $_POST["product_storage"];
  $product_camera = $_POST["product_camera"];
  $product_image = $_POST["product_image"];
  $product_quantity = $_POST["product_quantity"];
  $product_status = $_POST["product_status"];

  $query = "INSERT INTO `product`(`product_id`, `product_name`, `product_brand`, `product_price`, `product_ram`, `product_storage`, `product_camera`, `product_image`, `product_quantity`, `product_status`) VALUES" . 
  " ('NULL','$product_name','$product_brand','$product_price','$product_ram','$product_storage','$product_camera','$product_image','$product_quantity','$product_status')";
  $rows = $connect->exec($query);

  echo "Product saved successfully";

}

if(isset($_POST["editData"])){
  // get inputs 
  $id = $_POST["id"];
  $text = $_POST["text"];
  $column_name = $_POST["column_name"];
  $query = "UPDATE product SET $column_name = '$text' WHERE product_id = '$id'";
  $rows = $connect->exec($query);
  echo "Product updated successfully";
}

if(isset($_POST["deleteData"])){
  $id = $_POST["id"];
  $query = "DELETE FROM product WHERE product_id = '$id'";
  $rows = $connect->exec($query);
  echo "Product deleted successfully";
}