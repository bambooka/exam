<?php
if (isset($_POST['login_signin'])) { 
  $login = $_POST['login_signin']; 
  if ($login == '') { 
    unset($login);
  } 

    //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
  if (isset($_POST['pwd_signin'])) { 
    $password=$_POST['pwd_signin'];
    if ($password =='') {
      unset($password);
    } 
  }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
 {
  exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
 //удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
 // подключаемся к базе

require_once "config.php";

$sql = "SELECT * FROM user WHERE login='$login'";

if($result = $mysqli->query($sql)){
  if($result->num_rows > 0){
    echo 'ok';

    $result->free();
  } else{
    echo 'Похоже Вы ввели неверный логин или пароль. Попробуйте еще раз<br>';
    echo '<a href="index.php">На главную</a>';
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

}
?>