<div id="product-search">
  <div class="mybody container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-md-7">
        <p style="font-weight: bold;font-size: 36px;"><?php echo $result ?></p>
      </div>
      <div class="col-md-5 text-right">
        <?php include_once ('snippet/keyTypeSearch.php') ?>
      </div>
    </div>
    <div>
      <div class="row  margin-each-row">
        <div class="branch-name-row col-sm-12">
          <?php foreach($products as $row) {
            include 'snippet/productRow.php';
          } ?>
        </div>
      </div>
      
    </div>

  </div>
</div>