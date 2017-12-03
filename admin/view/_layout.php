<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>WEFASHION</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="admin/view/assets/stylesheets/bootstrap/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
  <link href="admin/view/assets/stylesheets/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />

  <script src="admin/view/assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/jquery/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/theme.js" type="text/javascript"></script>
  <script src="admin/view/assets/javascripts/demo.js" type="text/javascript"></script>
</head>
<body>
  <!--<% login = logins[0] %>-->
  <body class='contrast-red fixed-navigation'>
    <?php 

      // print_r($_SESSION);
      if (isset($_SESSION['current_user'])){
        $current_user = $_SESSION['current_user'];
      }
      // echo $current_user['avatar'];




      require_once PATH_APPLICATION . '/view/share/header.php';
      require_once PATH_APPLICATION . '/view/share/side-bar.php';
      
    ?>
    <section id='content'>
      <div class='container'>
        <div id="admin">
          <div class="mybody" style="width:90%">
            <?php 
              if(isset($_SESSION['msg'])){
                $messages = $_SESSION['msg'];
                unset($_SESSION['msg']);
                foreach($messages as $message) {
            ?>
              <div class="alert alert-<?php echo $message['type'] ?> alert-dismissible" role="alert" style="text-align:center; margin-bottom: 0px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $message['msg'] ?>
              </div>
            <?php
                }
              }
            ?>
            
            <?php require_once PATH_APPLICATION . '/view/' . $view . '.php';  ?>
          </div>
        </div>
      </div>
    </section>

  </body>
</body>
</html>