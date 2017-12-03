<div class='row'>
  <div class='col-sm-12'>
    <div class='box'>
      <div class='box-content'>
        <h2 class='pull-left' style="margin-bottom:30px;">Edit Member</h2>
        <form method="post" class="form form-horizontal" style="margin-bottom: 0;"  action="admin.php?c=member&a=update&id=<?php echo $member['id']?>" accept-charset="UTF-8">
        <div class='form-group'></div>

        <div class='form-group'>
          <label class='col-md-2 control-label' for='username'>Username</label>
          <div class='col-md-5'>
            <input class='form-control' name='username' type='text' value='<?php echo $member['userName'] ?>'>
          </div>
        </div>

        <div class='form-group'>
          <label class='col-md-2 control-label' for='disabledInput1'>Email</label>
          <div class='col-md-5'>
            <input class='form-control' disabled='' id='disabledInput1' placeholder='<?php echo $member['email'] ?>' type='text'>
          </div>
        </div>


        <div class='form-group'>
          <label class='col-md-2 control-label' for='password'>Password</label>
          <div class='col-md-5'>
            <input class='form-control' name='password' placeholder='******' type='password' >
          </div>
        </div>


        <div class='form-group'>
          <label class='col-md-2 control-label' for='password'>Admin?</label>
          <div class='col-md-5'>
            <input name='is_admin' type="checkbox" value="on" style="margin-top: 10px; transform: scale(1.5);" <?php echo $member['type']=="admin" ? "checked" : "" ?>>
          </div>
        </div>



        <div class='form-actions form-actions-padding-sm'>
          <div class='row'>
            <div class='col-md-10 col-md-offset-2'>
              <button class='btn btn-primary' type='submit'>
                <i class='icon-save'></i>
                Save
              </button>
              <a href="admin.php?c=member" class="btn">Cancel</a>
            </div>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div>
</div>