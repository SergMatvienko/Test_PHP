<?php
require "db.php";
?>

<?php if( isset($_SESSION['logged_user']) ) : ?>
	�����������
	<hr>
	<a href="/logout.php">�����</a>
<?php else : ?>
	<a href="/login.php">�����������</a>
	<a href="/signup.php">�����������</a>
<?php endif; ?>
