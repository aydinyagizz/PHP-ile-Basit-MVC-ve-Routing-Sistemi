<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<form action="" method="POST">
		
		<input type="text" name="username" placeholder="Üyelerde Arayın">
		<button type="submit">Gönder</button>
	</form>


	<ul>
		<?php foreach ($users as $user):  ?>
			<li>
				<?= $user['name'] ?>
			</li>
		<?php endforeach  ?>

	</ul>

</body>
</html>