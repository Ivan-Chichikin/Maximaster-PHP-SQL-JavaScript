const Table = document.querySelector("tbody");
const btn = document.querySelector(".resetBtn");
const Start = document.querySelector(".StartPrice");
const Finish = document.querySelector(".FinishPrice");
const TableHead = document.querySelector("thead");

const URL = "http://exercise.develop.maximaster.ru/service/products/";
const URL2 = "https://jsonplaceholder.typicode.com/users";
// const JSON = "/Applications/MAMP/htdocs/maximaster/JavaScript/product_table/file.json";

let DB;

const ShowTable = (data, StartPrice = 0, FinishPrice = Math.max() * (-1)) => {
    Table.innerHTML = "";

    data.forEach((Element, i) => {
        if(Number(Element.price) >= StartPrice && Number(Element.price) <= FinishPrice){
            const TableString = document.createElement("tr");
            const ID = document.createElement("td");
            const Name = document.createElement("td");
            const Price = document.createElement("td");
            const Quantity = document.createElement("td");
            const Sum = document.createElement("td");
            ID.innerHTML = i + 1;
            Name.innerHTML = Element.name;
            Price.innerHTML = Element.price;
            Quantity.innerHTML = Element.quantity;
            Sum.innerHTML = Number(Element.price * Element.quantity);
            TableString.appendChild(ID);
            TableString.appendChild(Name);
            TableString.appendChild(Quantity);
            TableString.appendChild(Price);
            TableString.appendChild(Sum);
            Table.appendChild(TableString);
        }
    })
    if(Table.innerHTML == ""){
        TableHead.classList.add("hide");
        Table.innerHTML = "Нет данных, попадающих под условие фильтра";
    }
    else{
        TableHead.classList.remove("hide");
    }
}

// function auth() {
//     let username= 'cli';
//     let password= '12344321';
//
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', URL, true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             var response = URL.parse(xhr.responseText);
//             if (response.success) {
//                 // авторизация успешна
//                 var token = response.token;
//                 // сохраняем токен в localStorage или cookie
//             } else {
//                 // ошибка авторизации
//                 var error = response.error;
//                 // выводим ошибку на страницу
//             }
//         }
//     };
//     xhr.send('ursername=' + encodeURIComponent(username) +
//         '&password=' + encodeURIComponent(password));
// }
// auth();

fetch(URL)
    .then(data => data.json())
    .then(data => {
        // auth();
        DB = data
        ShowTable(data)
        console.log(data)
    })

// setListener(btn, 'click', () =>{
//     // const StartValue = Number(Start.value);
//     // const FinishValue = Number(Finish.value);
//     // if(StartValue == 0 && FinishValue == 0){
//     //     ShowTable(DB);
//     // }
//     // else if(StartValue <= FinishValue && !isNaN(StartValue) && !isNaN(FinishValue)){
//     //     ShowTable(DB, Number(Start.value), Number(Finish.value));
//     // }
//     // else{
//     //     console.log("Error");
//     // }
//     console.log(1);
// })

btn.addEventListener('click', () => {
    const StartValue = Number(Start.value);
    const FinishValue = Number(Finish.value);
    if(StartValue == 0 && FinishValue == 0){
        ShowTable(DB);
    }
    else if(StartValue <= FinishValue && !isNaN(StartValue) && !isNaN(FinishValue)){
        ShowTable(DB, Number(Start.value), Number(Finish.value));
    }
    else{
        console.log("Error");
    }
})