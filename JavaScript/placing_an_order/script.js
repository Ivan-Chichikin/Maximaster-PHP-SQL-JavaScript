ymaps.ready(init);
let myPlacemark = 0;

function init() {

    let myMap = new ymaps.Map('map', {
        center: [54.19388417407499,37.62031931009947],
        zoom: 13
    }, {
        searchControlProvider: 'yandex#search'
    });

    myMap.events.add('click', function (e) { // клик на карте
        var coords = e.get('coords');

        if (myPlacemark) { // если метка стоит, передвигаем её
            myPlacemark.geometry.setCoordinates(coords);
        }
        else { // иначе создаём
            myPlacemark = createPlacemark(coords);
            myMap.geoObjects.add(myPlacemark);

            myPlacemark.events.add('dragend', function () { // событие оконачния перетаскивания метки
                getAddress(myPlacemark.geometry.getCoordinates());
            });
        }
        getAddress(coords);
    });

    function createPlacemark(coords) { // создание метки
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // координаты точки
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', coords);

                    // адрес вместо координат

        // ymaps.geocode(coords).then(function (res) {
        //     var firstGeoObject = res.geoObjects.get(0);
        //
        //     myPlacemark.properties.set({
        //         iconCaption: [ // формирование строки с данными об объекте.
        //             // название населенного пункта
        //             firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
        //             // получение пути до места. если метод вернул null, запрашиваем наименование здания.
        //             firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
        //         ].filter(Boolean).join(', '),
        //
        //         balloonContent: firstGeoObject.getAddressLine()  // в качестве контента задаем строку с адресом объекта.
        //     });
        // });
    }
}

var form = document.querySelector('.form');

function validate(){
    var Name = document.getElementById('name').value;
    var Phone = document.getElementById('phone').value;
    var Email = document.getElementById('email').value;

    // if (Name.length == 0){
    //     document.getElementById('nameE').innerHTML = 'Не заполнено поле ФИО';
    //     return false;
    // }
    //
    // if (Phone.length == 0){
    //     document.getElementById('phoneE').innerHTML = 'Не заполнено поле Телефон';
    //     return false;
    // }

    // Закоментировал условия, так как сделал поля обязательными.

    if (!Phone.replace(/[^а-яё\d\-\s]/gi,'')){
        document.getElementById('phoneE').innerHTML = 'Телефон введен неверно';
        return false;
    }

    dog = Email.indexOf("@");

    if (dog < 1){
        document.getElementById('emailE').innerHTML = 'Email введен неверно';
        return false;
    }

    if (myPlacemark == 0){
        document.getElementById('mapE').innerHTML = 'Не выбрана координата';
        return false;
    }

    document.getElementById('ok').innerHTML = 'Заказ оформлен';

}

form.addEventListener('submit', e => {e.preventDefault(); validate()})
