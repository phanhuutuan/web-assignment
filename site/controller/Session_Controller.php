<?php if( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Session_Controller extends Base_Controller
{
	//User register
	public function registerAction(){
		$errors = array('error' => 0);

		//Step1: Get information
		$phone		= isset($_POST['phone']) ? trim($_POST['phone']) : '';
		$email      = isset($_POST['email'])    ? trim($_POST['email'])    : '';
		$username   = isset($_POST['userName']) ? trim($_POST['userName']) : '';
		$password   = isset($_POST['password']) ? trim($_POST['password']) : '';
		$confirmPwd	= isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';

		//Step2: Validate information


		if (empty($phone)){
			$errors['phone'] = 'Bạn chưa nhập Phone';
		}

		if (empty($email)){
			$errors['email'] = 'Bạn chưa nhập Email';
		}

		if (empty($username)){
			$errors['userName'] = 'Bạn chưa nhập tên đăng nhập';
		}

		if (empty($password)){
			$errors['password'] = 'Bạn chưa nhập mật khẩu';
		}

		if (empty($confirmPwd)){
			$errors['confirmPwd'] = 'Chưa xác nhận mật khẩu';
		}

		if ($password !== $confirmPwd){
			$errors['checkPwd'] = 'Mật khẩu xác nhận và mật khẩu chưa trùng khớp';
		}

		//Step3: Check errors and return immediately or go next step
		if(count($errors) > 1){
			$errors['error'] =1;
			die(json_encode($errors));
		}

		//Step4: Connect database and check information
		$member = $this->database->query("SELECT * FROM account WHERE userName = '$username' OR email = '$email'");
		$member = $member->fetchAll();
		if($member){
			for ($i=0; $i < count($member) ; $i++) { 
				if($member[$i]['email'] == $email)
					$errors['email'] = 'Email đã tồn tại';
			}
		}

		//Step5: Return when getting errors
		if (count($errors) > 1) {
			$errors['error'] = 1;
			die(json_encode($errors));
		}

		//Step6: Save in database
		$insertAccount = $this->database->query("INSERT INTO account(email,userName,passWord,type,avatar,phoneNumber) VALUES ('$email','$username','$password','member','defaultAvatar.jpg', '$phone')");

		// Trả kết quả cuối cùng
		$_SESSION['msg'][0] = array('type'=>'success','msg'=>'Đăng ký thành công');
		die(json_encode($errors));
	}


	//User login
	public function loginAction(){
		$errors = array('error' => 0);

		$email      = isset($_POST['email'])    ? trim($_POST['email'])    : '';
		$password   = isset($_POST['password']) ? trim($_POST['password']) : '';
		if (empty($email)){
			$errors['email'] = 'Bạn chưa nhập Email';
		}

		if (empty($password)){
			$errors['password'] = 'Bạn chưa nhập mật khẩu';
		}

		if (count($errors) > 1){
			$errors['error'] = 1;
			die (json_encode($errors));
		}

		$member = $this->database->query("SELECT * FROM account WHERE email = '$email'");
		$member = $member->fetch();
		if($member){
			// if ($member['is_block']){
			// 	$errors['is_block'] = 'Your account has been blocked';
			// 	$errors['error'] = 1;
			// 	die (json_encode($errors));
			// }

			if ($member['passWord'] == $password)
			{
				$_SESSION['current_user'] = $member;
				$_SESSION['valid'] = true;
			}
			else
			{
				$errors['wrong_password'] = 'Mật khẩu chưa đúng';
			}
		}
		else{
			$errors['wrong_member'] = 'User chưa tồn tại';
		}

		if (count($errors) > 1){
			$errors['error'] = 1;
			die (json_encode($errors));
		}
		$_SESSION['msg'][0] = array('type'=>'success','msg'=>'Đăng nhập thành công');
		die (json_encode($errors));
	}

	//User logout
	public function logoutAction(){
		unset($_SESSION['current_user']);
		unset($_SESSION['valid']);
		$_SESSION['msg'][0]= array('type' => 'danger' , 'msg' =>'Đăng xuất thành công');
		header('Location: index.php?c=home');
	}

	public function editAction(){
		$this->view->load('member-page');
	}
	public function updateAction(){
    if (isset($_SESSION['current_user']))
    {
      $member_id = $_SESSION['current_user']['id'];
      $member = $this->database->query("SELECT * FROM account WHERE id = '$member_id' ") -> fetch();

      $this->library->upload->upload($_FILES["image"]);
      $new_avatar = $_FILES["image"]["name"];


      if (!empty($new_avatar)){
        $this->database->query("UPDATE account SET avatar='$new_avatar' WHERE id=$member_id");
      }

      $new_username = $_POST['username'];
      $this->database->query("UPDATE account SET userName='$new_username' WHERE id=$member_id");
      if (isset($_POST['current_password']) && !empty($_POST['current_password']))
      {
        if ($_SESSION['current_user']['passWord'] == $_POST['current_password'])
        {
          if (isset($_POST['new_password']) && !empty($_POST['new_password']))
          {
            $new_password = $_POST['new_password'];
            $this->database->query("UPDATE account SET passWord='$new_password' WHERE id=$member_id");
            unset($_SESSION['current_user']);
            unset($_SESSION['valid']);
            $_SESSION['msg'][1] = array('type'=>'danger','msg'=>'Please login again with new password');
          }
          else
          {
            $_SESSION['msg'][0] = array('type'=>'danger','msg'=>'Password cant be blank');
            header('Location: index.php?c=session&a=edit');
            return;
          }
        }
        else // wrong current password
        {
          $_SESSION['msg'][0] = array('type'=>'danger','msg'=>'Your current password is not correct');
          header('Location: index.php?c=session&a=edit');
          return;
        }
      }
      else{
      	if (isset($_POST['new_password']) && !empty($_POST['new_password'])) 
      	{
      		$_SESSION['msg'][0] = array('type'=>'danger','msg'=>'Current password cant be blank');
          	header('Location: index.php?c=session&a=edit');
          	return;
      	}
      }
      $_SESSION['msg'][0] = array('type'=>'success','msg'=>'You have successfully updated profile');
      header('Location: index.php?c=home');
    }
    else
    {
      die("cant find this member");
    }
  }
}