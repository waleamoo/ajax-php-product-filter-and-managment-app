
<?php include('header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <div class="list-group">
          <h3>Price</h3>
          <input type="hidden" id="hidden_minimum_price" value="0">
          <input type="hidden" id="hidden_maximum_price" value="65000">
          <p id="price_show">10000 - 65000</p>
          <div id="price_range"></div>
        </div>

        <div class="list-group">
          <h3>Brand</h3>

          <?php 
          $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
          $rows = $connect->query($query);
          foreach($rows as $row){
          ?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"> <?php echo $row['product_brand']; ?></label>
          </div>
          <?php } ?>

        </div>

        <div class="list-group">
          <h3>RAM</h3>

          <?php 
          $query = "SELECT DISTINCT(product_ram) FROM product WHERE product_status = '1' ORDER BY product_ram DESC";
          $rows = $connect->query($query);
          foreach($rows as $row){
          ?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['product_ram']; ?>"> <?php echo $row['product_ram']; ?> GB</label>
          </div>
          <?php } ?>

        </div>

        <div class="list-group">
          <h3>Internal Storage</h3>

          <?php 
          $query = "SELECT DISTINCT(product_storage) FROM product WHERE product_status = '1' ORDER BY product_storage DESC";
          $rows = $connect->query($query);
          foreach($rows as $row){
          ?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['product_storage']; ?>"> <?php echo $row['product_storage']; ?> GB</label>
          </div>
          <?php } ?>

        </div>


      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <h2 class="my-2">Product filter</h2>
        
          <div class="row filter_data"></div>

        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <?php include('footer.php'); ?>