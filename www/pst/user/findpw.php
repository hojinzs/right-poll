<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * find password POST
 * @param var $user_id 로그인 아이디 ($user_id)
 * @param var $email User Email
 */

// post 파라미터가 제대로 넘어왔는지 확인
if (!isset($_POST['user_id'])) {echo "error:: user_id is not sent"; return;};
if (!isset($_POST['email'])) {echo "error:: email is not sent"; return;};

// post 파라미터 세팅
$id = $_POST['user_id'];
$email = $_POST['email'];

// Email Check 시도
$result = checkEmailAvailable($id,$email);

// Email Check 실패시 에러 메시지 반환
if($result!="success"){
    echo $result;
    return;
}

// Send Verify Email
$result = \User\Common::sendVerifiyEmail($email);

// Send Email 실패시 에러 메시지 반환
if($result!="success"){
    echo $result;
    return;
}

$_SESSION['findpw']['target_user_id'] = $id;

echo "success";
return;

// Function 

function checkEmailAvailable($user_id,$email){
	//1. Get Userdata for $user_id
	$user = \User\Common::getUserInfomation($user_id);

	//2. is Userdata NULL??
	if($user==NULL){
		return "Error:: cannot find user information";
	}
	
	//3. Check Email 
	if($user['email']!=$email){
		return "Error:: cannot find user information";
	}
	
	//4. return Success
	return "success";
	
};