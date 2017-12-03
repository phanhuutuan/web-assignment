<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Member_Controller extends Base_Controller
{
  public function indexAction()
  {
    $members = $this->database->query("SELECT * FROM account");
    $this->view->load('member', array('members' => $members));
  }

  public function editAction()
  {
    $member_id = $_GET['id'];
    $member = $this->database->query("SELECT * FROM account WHERE id = '$member_id' ") -> fetch();
    if ($member){
      $this->view->load('member/edit_member', array('member' => $member));
    }
    else
    {
      die("cant find this member");
    }
  }

  public function updateAction()
  {
    $member_id = $_GET['id'];
    $member = $this->database->query("SELECT * FROM account WHERE ID = '$member_id' ") -> fetch();

    if ($member){
      $new_username = $_POST['username'];
      if (isset($_POST['is_admin']) && ($_POST['is_admin'])=="on" ){
        $type = "admin";
      }
      else{
        $type = "member";
      }

      if (isset($_POST['password']) && !empty($_POST['password']))
      {
        $new_password = $_POST['password'];
        $this->database->query("UPDATE account SET username='$new_username', password=md5('$new_password'), type = '$type' WHERE id=$member_id");
      }
      else
      {
        $this->database->query("UPDATE account SET username='$new_username', type = '$type' WHERE id=$member_id");
      }
      $_SESSION['msg'][0] = array('type'=>'success','msg'=>'You have successfully updated member');
      header('Location: admin.php?c=member');
    }
    else
    {
      die("cant find this member");
    }

  }

  public function disableAction(){
    $member_id = $_GET['id'];
    $member = $this->database->query("SELECT * FROM account WHERE id = '$member_id' ") -> fetch();
    if ($member) {
      $this->database->query("UPDATE account SET is_block=1 WHERE id=$member_id");
      $_SESSION['msg'][0] = array('type'=>'success','msg'=>'You have successfully disabled member');
      header('Location: admin.php?c=member');
    }
    else
    {
      die("cant find this member");
    }
    
  }

  public function enableAction(){
    $member_id = $_GET['id'];
    $member = $this->database->query("SELECT * FROM account WHERE id = '$member_id' ") -> fetch();
    if ($member) {
      $this->database->query("UPDATE account SET is_block=0 WHERE id=$member_id");
      $_SESSION['msg'][0] = array('type'=>'success','msg'=>'You have successfully enabled member');
      header('Location: admin.php?c=member');
    }
    else
    {
      die("cant find this member");
    }
    
  }

}