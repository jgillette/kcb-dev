<? 
	# This is the public page for memberLogin which the ajax requests call.
	include_once('includes/class/member.class.php');

	$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
	$code_type = isset($_REQUEST["codeType"]) ? $_REQUEST["codeType"] : null;
	$auth_cd = isset($_REQUEST["auth_cd"]) ? $_REQUEST["auth_cd"] : null;
	$auth_remember = isset($_REQUEST["auth_remember"]) ? $_REQUEST["auth_remember"] : null;
	$fb_id = isset($_REQUEST["fb_id"]) ? $_REQUEST["fb_id"] : null;

	$mbr = new Member(false);

	if($email != null && $code_type != null && $fb_id == null && $auth_cd == null) {
		echo $mbr->login($email, $code_type);
	}
	elseif ($email != null && $auth_cd != null && $code_type != null){
		echo $mbr->verifyAuthCd($email, $code_type, $auth_cd, $auth_remember);
	}
	elseif($email !=null && $fb_id != null) {
		echo $mbr->facebookLogin($email, $fb_id);
	}
	else {
		echo "invalid_request";		
	}
?>