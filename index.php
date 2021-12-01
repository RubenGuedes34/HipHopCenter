

<?php
include("includes/configs.php");
session_destroy();
if(isset($_SESSION['userLoggedIn'])){
	$userLoggedIn = $_SESSION ['userLoggedIn'];
}else{
	header("Location: register.php");
}
?>
<html>
<head>
	<title>Welcome to hiphopcenter bitches!</title>
</head>

<body>
	Hello!
</body>

</html>