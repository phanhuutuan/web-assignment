<?php
 session_start(); 
// Đường dẫn tới hệ  thống
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/admin');
 
// Lấy thông số cấu hình
require (PATH_SYSTEM . '/config/config.php');
 
//mở file Common.php, file này chứa hàm Load() chạy hệ thống
include_once PATH_SYSTEM . '/core/Common.php';
 
// Chương trình chính

require_once PATH_SYSTEM . '/core/connector/MySql_Connector.php';
$database = new MySql_Connector();
$db_admin = $database->getConnection();



if (isset($_SESSION['current_user']) and ($_SESSION['current_user']!=null)){
  $member_id = $_SESSION['current_user']['id'];
  $member = $db_admin->query(" SELECT * FROM account WHERE id = '$member_id' ")->fetch();
  $_SESSION['current_user'] = $member;

  if ($_SESSION['current_user']['type'] == "admin"){
    if ($_SESSION['current_user']['is_block']){
      unset($_SESSION['current_user']);
      unset($_SESSION['valid']);
      // session_destroy();
      $_SESSION['msg'][0] = array('type'=>'danger','msg'=>'Your account has been blocked');
      header('Location: site.php?c=home');
    }
    else
    {
      Main_load();
    }
  }
  else
  {
    $_SESSION['msg'][0] = array('type'=>'danger','msg'=>'You are not an admin');
    header("Location:site.php?c=home");
  }

}
else
{
  $_SESSION['msg'][0] = array('type'=>'danger','msg'=>'You are not an admin');
  header("Location:site.php?c=home");
}
