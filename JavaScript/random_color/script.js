let ChangeColorBtn = document.querySelector(".button")
let InputWidth = document.getElementById("inputWidth");
let InputHeight = document.getElementById("inputHeight");

var block = document.querySelector(".block");

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

// Случайный цвет (кнопка)
ChangeColorBtn.addEventListener('click', ()=> {
    block.style.backgroundColor = getRandomColor();
});

// Ширина
InputWidth.addEventListener('input', () => {
    let w = document.createElement('w');
    w.innerText = InputWidth.value; // записываем значение из поля ввода
    const innerW = w.innerHTML; // преваращаем html-элем. в строку
    block.style.width = innerW + 'px';
});

// Высота
InputHeight.addEventListener('input', () => {
    let h = document.createElement('w');
    h.innerText = InputHeight.value; // записываем значение из поля ввода
    const innerH = h.innerHTML; // преваращаем html-элем. в строку
    block.style.height = innerH + 'px';
});
