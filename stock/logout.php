<?php
session_start();
unset($_SESSION['username']);
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
    window.location = "login.php";
</script>
</head>
<body>

</body>
</html>