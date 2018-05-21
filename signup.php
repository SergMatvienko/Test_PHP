<?php
require "db.php";

$data = $_POST;
if(isset($data['do_signup']))
{
//register
	$errors = array();	
	if( trim( $data['login']) == '')
	{
		$errors[] = '������� �����';
	}

	if( trim( $data['email']) == '')
	{
		$errors[] = '������� E-mail';
	}
	
	if( $data['password'] == '')
	{
		$errors[] = '������� ������';
	}

	if( $data['password1'] != $data['password'])
	{
		$errors[] = '������ �� ���������';
	}

	if( trim( $data['date_b']) == '')
	{
		$errors[] = '������� ���� ��������';
	}

	if( R::count('users', "login = ? OR email = ?", array($data['login'], $data['email'])) > 0 )
	{
		$errors[] = '����� ������������ ����������';
	}
	if( empty($errors))
	{
	//register
	$user = R::dispense(users);
	$user->login = $data['login'];
	$user->email = $data['email'];
	$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	$user->date_b = $data['date_b'];
	R::store($user);
	echo '<div style="color: green;">�������� �����������</div><hr>';	

	}else
	{
	echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
}


?>

<form action="/signup.php" method="POST">

	<p>
	<p><strong>��� / �����:</strong></p>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
	<p><strong>E-mail:</strong></p>
	<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>

	<p>
	<p><strong>������:</strong></p>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	
	<p>
	<p><strong>��������� ������:</strong></p>
	<input type="password" name="password1" value="<?php echo @$data['password1']; ?>">
	</p>

	<p>
	<p><strong>���� ��������:</strong></p>
	<input type="date" name="date_b" value="<?php echo @$data['date_b']; ?>">
	</p>

	<p>
	<button type="submit" name="do_signup">��������� �����������</button>
	</p>

</form>

