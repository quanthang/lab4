<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="result"></div>
<div id="content">
    <input type="text" id="firstname">
    <input type="text" id="lastname">
    <input type="text" id="phone">
    <input type="text" id="email">
    <input type="text" id="address">
    <button id="submit">Send</button>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#submit').click(function (){
            $.ajax({
                url: '/api.php/user',
                method: 'POST',
                dataType: 'text',
                data: {
                    firstname: $('#firstname').val(),
                    lastname: $('#lastname').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                    address: $('#address').val(),
                },
                success: function (data) {
                    window.location.href = '/list.php'
                    $('#result').html(data)
                },
                error: function () {

                }
            })
        })

    })
</script>
</body>
</html>
