<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Оформление заказа</title>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=5f8b39c5-f239-469c-904b-e85ebf6615c7&lang=ru_RU" type="text/javascript"></script>
<!--    Ключ API интерфейса "JavaScript API и HTTP Геокодер"-->
<!--    <script src="https://api-maps.yandex.ru/v3/?apikey=YOUR_API_KEY&lang=ru_RU" type="text/javascript"></script>-->
</head>
<body><br>
<form class='form' align="center">

    <input id="name" class="field" type="text" placeholder="ФИО" style="width: 300px; height: 20px" required> <br><br>
    <input id="phone" class="field" type="text" placeholder="Телефон" style="width: 300px; height: 20px" required> <br><br>
    <input id="email" class="field" type="text" placeholder="Email" style="width: 300px; height: 20px"> <br><br>

    <div id="map" style="width: 308px; height: 200px; margin-left: auto; margin-right: auto;"></div> <br>

    <textarea name="comment" id="comment" cols="37" rows="5" placeholder="Комментарий к заказу (макс. 500 символов)" maxlength='500' style="width: 300px; height: 150px"></textarea> <br><br>

    <button type="submit" class="send-btn">Отправить</button>

            <br><br>
            <span style='color:red' id='emailE'></span>
            <br>
            <span style='color:red' id='mapE'></span>
            <br>
            <span style='color:green' id='ok'></span>
            <br>
            <span style='color:red' id='nameE'></span>
            <br>
            <span style='color:red' id='phoneE'></span>


</form>
<script type="text/javascript" src="script.js"></script>
</body>



