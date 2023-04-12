<!DOCTYPE html>
<html>
<head>
<title>Информация</title>
<meta charset="utf-8" />
</head>
<style type="text/css">
   TABLE {
    width: 300px;
    border-collapse: collapse;
   }
   TD, TH {
    padding: 3px;
    border: 1px solid black;
   }
   TH {
    background: #b0e0e6;
   }
  </style>
<body>
	<h3>Все пользователи</h3>
	<?php
	require_once "config.php";

	$sql = "SELECT *
			FROM users";
	if($result = $DataBase->query($sql)){
		echo "<table>
				<tr>
					<th>Логин &nbsp</th>
					<th>статус &nbsp</th>
					<th>Фамилия &nbsp</th>
					<th>Имя &nbsp</th>
					<th>Отчество &nbsp</th>
					<th>Дата рождения &nbsp</th>
				</tr>";
		foreach($result as $row){
			if ($row["status"] != 'admin'){
				echo "<tr>";
				echo "<td>" . $row["username"] . "</td>";
				echo "<td>" . $row["status"] . "</td>";
				echo "<td>" . $row["surname"] . "</td>";
				echo "<td>" . $row["firstname"] . "</td>";
				echo "<td>" . $row["patronymic"] . "</td>";
				echo "<td>" . $row["dob"] . "</td>";
				echo "<td><a href='UpdateInfo.php?id=" . $row["id"] . "'>Изменить</a></td>";
				echo "<td>
						<form action='DeleteUser.php' method='post'>
							<input type='hidden' name='id' value='" . $row["id"] . "' />
							<input type='submit' value='Удалить'>
						   </form>
					 </td>";
				echo "</tr>";
			}
			
		}
		echo "</table>";
		$result->free();
	} else{
		echo "Ошибка: " . $DataBase->error;
	}
	$DataBase->close();
	?>
	<a href="../source/MainPage.php">Вернуться на главную</a>
</body>
</html>