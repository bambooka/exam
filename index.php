<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <button id='btn_signup'>Зарегистрироваться</button>
    <button id='btn_signin'>Войти</button>

    <form method='POST' action='' id='signup'>
        <label for='login_signup'>Логин</label><br>
        <input type="text" name="login_signup" id='login_signup'><br>
        <label for='pwd_signup'>Пароль</label><br>
        <input type="text" name="pwd_signup" id='pwd_signup'><br>
        <label for='user_name'>Фамилия Имя Отчество</label><br>
        <input type="text" name="user_name" id='user_name'><br><br>

        <input type="submit" name="signup_user" value='Зарегистрироваться'>
    </form>

    <form method='POST' action='' id='signin'>
        <label for='login_signin'>Логин</label><br>
        <input type="text" name="login_signin" id='login_signin'><br>
        <label for='pwd_signin'>Пароль</label><br>
        <input type="text" name="pwd_signin" id='pwd_signin'><br>
        
        <input type="submit" name="signin_user" value='Войти'>
    </form>
</body>
</html>