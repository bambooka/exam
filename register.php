<?php
if (isset($_POST['login_signup'])) { 
    $login = $_POST['login_signup']; 
    if ($login == '') { 
        unset($login);
    } 

    //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['pwd_signup'])) { 
        $password=$_POST['pwd_signup'];
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

$sql = "SELECT login FROM user WHERE login='$login'";
$sql_add = "INSERT INTO user (login,password,role) VALUES ('$login', '$password','Заказчик')";

if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo 'error';
                            // Free result set
        $result->free();
    } else{
        $mysqli->query($sql_add);
        echo 'Вы успешно зарегистрировались. Теперь Вы можете войти в систему<br>';
        echo '<a href="index.php">На главную</a> ';
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

}
$mysqli->close();
?>