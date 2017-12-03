<div class='row'>
  <div class='col-sm-12'>
    <div class='box'>
      <div class='box-content'>
        <h2 class='pull-left' style="margin-bottom:30px;">New product</h2>
        <form method="POST" action="admin.php?c=product&a=create" class="form form-horizontal" style="margin-bottom: 0;" accept-charset="UTF-8" enctype="multipart/form-data">
          <div class='form-group'></div>

          <div class='form-group'>
            <label class='col-md-2 control-label' for='name'>Name</label>
            <div class='col-md-10'>
              <input class='form-control' name='name' type='text' value=''>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-md-2 control-label' for='price'>Price</label>
            <div class='col-md-10'>
              <input class='form-control' name='price' type='text' value=''>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-md-2 control-label' for='quantity'>Quantity</label>
            <div class='col-md-10'>
              <input class='form-control' name='quantity' type='text' value=""></input> 
            </div>
          </div>

          <div class='form-group'>
            <label class='col-md-2 control-label' for='type'>Type</label>
            <div class='col-md-10'>
              <select name="typeProduct" style="margin-top: 8px;">
                <?php foreach ($typeProduct as $row) { ?>
                <option value=<?php echo $row['idType'] ?> >
                  <?php echo $row['idType']."-".$row['NameType']?>
                </option>

                <?php }?>
              </select>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-md-2 control-label' for='image'>Image</label>
            <div class='col-md-10'>
              <input class='form-control' name='image' type='file' value=''> 
            </div>
          </div>

          <div class='form-actions form-actions-padding-sm'>
            <div class='row'>
              <div class='col-md-10 col-md-offset-2'>
                <button class='btn btn-primary' type='submit' id="createProduct">
                  <i class='icon-save'></i>
                  Save
                </button>
                <a href="admin.php?c=product" class="btn btn-notice"> Cancel </a>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>