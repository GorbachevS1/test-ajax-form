<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Test</title>
</head>
<body>
    <h1 class="contact">Контактная форма</h1>
    <form method="post" id="form">
        <p>Имя: <input type="text" name="username" id="username" required></p>
        <p>Телефон: <input type="text" name="tel" id="tel" placeholder="+79065455252" required></p>
        <button type="submit" id="submit">Отправить</button>
    </form>

    <script>
        $(document).ready(function(){
            $('#form').on('submit', function() {
                let usernameVal = $('#username').val();
                let telVal = $('#tel').val();
                event.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "test.php",
                    async: false,
                    
                    data: { username: usernameVal, tel: telVal },
                    success: function(data){
                        if (data == 1) {
                            $('#form').remove();
                            $('h1.contact').remove();
                            $( "body" ).append( "<p>Форма успешно отправлена</p>" );
                        } else{
                            $( "#form" ).append( "<p>Ошибка, проверьте правильность введённых вами данных</p>" );
                        }
                    },
                    error: function(){
                        $( "#form" ).append( "<p>Ошибка, проверьте правильность введённых вами данных</p>" );
                    },
                })
            });
        });

    </script>
</body>
</html>