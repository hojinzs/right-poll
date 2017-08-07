<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * find ID POST
 * @param var $email User Email
 */

// post 파라미터가 제대로 넘어왔는지 확인
if (!isset($_POST['email'])) {echo "error:: email is not sent"; return;};

// post 파라미터 세팅
$email = $_POST['email'];

// Send Verify Email
$result = sendIdentifyEmail($email);

// Send Email 실패시 에러 메시지 반환
if($result!="success"){
    echo $result;
    return;
}

echo "success";
return;

// Function 

function sendIdentifyEmail($email){
	
	//1. Find Userdata for $email
    $query =
    "SELECT
        u.user_id
    FROM
        rightpoll.user u
    WHERE
        u.email = :email
    ";
    $stmt = \db()->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch();

	//2. is Userdata NULL??
	if($row['user_id'] == NULL){
		return "Error:: cannot find user information";
	}
	
	//3. Send Email 
	$user_id = $row['user_id'];
	
	    $contents = "
	    공약지킴이 인증 메일<br>
	    <h1>ID information</h1><br>
	    Your ID is <b>".$user_id."</b><br>
	    <br>
	    감사합니다.<br>
	    ";
	    $subject = "공약지킴이 가입 인증 코드";
	
	    // 이메일 발송 결과 호출
	    $sendResult = \App\Mail::sendMail($subject,$contents,$email,$email);
	
	    // 발송 결과가 success가 아니라면, 발송 에러를 출력한다.
	    if ($sendResult != 'Message sent!') {
		    return $sendResult;
	    }
	
	//4. return Success
	return "success";
	
};