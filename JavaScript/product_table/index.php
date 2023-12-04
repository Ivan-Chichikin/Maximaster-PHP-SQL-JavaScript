<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Таблица товаров</title>
    <script type="text/javascript" defer src="script.js"></script>
</head>
<body><br>
<form class='form' align="center">
    <div class="content">
        <div class="header">
            Цена от: <input type="text" class="StartPrice" placeholder="0" style="height: 13px">
            до: <input type="text" class="FinishPrice" placeholder="10000" style="height: 13px">
            <button class="resetBtn" style="height: 27px">Обновить</button>
        </div>
        <div class="body">
            <table>
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Количество</td>
                    <td>Цена за единицу</td>
                    <td>Сумма</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
</html>
