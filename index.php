<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container mt-4">
    <form method="post" id="registerForm" >
        <h1>Регистрация</h1>
        <div id="error" class="error"></div>
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" ><br>
        <label for="surname">Фамилия</label>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию" ><br>
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Введите e-mail" required ><br>
        <label for="surname">Пароль</label>
        <input type="password" class="form-control" name="pass1" id="password1" placeholder="Введите пароль" required minlength="6"><br>
        <label for="surname">Повтор пароля</label>
        <input type="password" class="form-control" name="pass2" id="password2" placeholder="Повторите пароль" required minlength="6"><br>
        <input class="btn btn-sucсses" type="submit" id="sbmt" value="Зарегистрироваться">
    </form>
</div>
<div id="container mt-4">
    <div id="closeForm" class="closeForm"></div>

</div>
</body>
</html>

<script>
    registerForm.onsubmit = async (e) => {
        e.preventDefault();

        const response = await fetch('register.php', {
            method: 'POST',
            body: new FormData(registerForm)
        });
        console.log(response);
        const result = await response.json();
        const test = document.querySelector('#error');
        test.innerText = "";
        if (response && response.ok){
            console.log(result);
            console.log(result.message);
            const test = document.querySelector('#closeForm');
            console.log(test);
            test.innerText = result.message;
            document.querySelector('#registerForm').style.display = 'none';
        }
        if (response && !response.ok){
            console.log(result);
            console.log(result.message);
            const test = document.querySelector('#error');
            console.log(test);
            test.innerText = result.message;
        }
    };
</script>