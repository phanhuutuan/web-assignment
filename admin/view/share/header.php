<header>
  <nav class='navbar navbar-default' >
    <a class='navbar-brand' href='site.php?c=home' style="font-family: cursive;">
      <img src="upload/images/logoWF.png" id="logo" alt="" style="width: 124px;">
    </a>
    <a class='toggle-nav btn pull-left' href='#'>
      <i class='icon-reorder'></i>
    </a>
    <ul class='nav'>
      <li class='dropdown dark user-menu'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
          <img width="23" height="23" alt="Admin Avatar" src="upload/images/<?php echo $current_user['avatar']?>" />
          <span class='user-name'><?php echo $current_user['userName']?></span>
          <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
          <li>
            <a href='site.php?c=session&a=edit'>
              <i class='icon-user'></i>
              Profile
            </a>
          </li>
          <li>
            <!-- <a href='#'>
              <i class='icon-cog'></i>
              Settings
            </a> -->
          </li>
          <li class='divider'></li>
          <li>
            <a href='site.php?c=session&a=logout'>
              <i class='icon-signout'></i>
              Sign out
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <form action='admin.php?c=search&a=search' class='navbar-form navbar-right hidden-xs' method='POST'>
      <button class='btn btn-link icon-search' name='button' type='submit'></button>
      <div class='form-group'>
        <input value="" class="form-control" placeholder="Search..." autocomplete="off" id="q_header" name="key" type="text" />
      </div>
    </form>
  </nav>
</header>