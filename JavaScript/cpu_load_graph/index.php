<!DOCTYPE html>
<html lang="ru">
<head>
    <title>График загруженности процессора</title>
<!--    <script type="module" src="script.js"></script>-->
</head>
<body><br>

<canvas id="cpuChart" width="600px" height="300px"></canvas>
<span class="errors"></span>
    <div class="errors"></div>


<canvas id="cpuChart" width="600px" height="300px"></canvas>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
    let requests = 1;
    let badRequests = 0;

    let ctx = document.querySelector('#cpuChart').getContext('2d');
    let errors = document.querySelector('.errors');
    ctx.canvas.parentNode.style.height = '300px';
    ctx.canvas.parentNode.style.width = '600px';
    let chart = new Chart (ctx, {
        type: 'line',
        data:{
            labels: [], // 1, 2, 3, 4, 5
            datasets: [{
                label: 'Загруженность процессора',
                data: [], // 10, 20, 30, 40, 50
                backgroundColor: ['white'],
                borderColor: ['black'],
                borderWidth: 1
            }]
        },
        options:{
            maintainAspectRatio: false,
        }
    });

    async function getCPUUtilization() {
        const response = await fetch('http://exercise.develop.maximaster.ru/service/cpu/');
        requests++;

        if (response.ok) {
            const utilization = await response.text();
            console.log(utilization);
            chart.data.labels.push(requests);
            chart.data.datasets[0].data.push(Number(utilization));
            chart.update();
        } else badRequests++;

        errors.innerHTML = `Всего запросов: ${requests}. Процент запросов, вернувших ошибку: ${(badRequests / requests) * 100}%`;
    }
    setInterval(getCPUUtilization, 5000);
    // http://exercise.develop.maximaster.ru/service/cpu/
    // https://www.alphavantage.co/query?function=ALUMINUM&interval=monthly&apikey=demo
</script>

<!--    <canvas></canvas>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
<!--    <script>-->
<!--        // Получение контекста для рисования-->
<!--        let canvas = window.document.querySelector('canvas');-->
<!--        let context = canvas.getContext('2d');-->
<!--        // Функции-->
<!--        const createLineChart = (xData, yData) => {-->
<!--            let data = {-->
<!--                labels: xData,-->
<!--                datasets: [{-->
<!--                    label: 'Загруженность процессора',-->
<!--                    data: yData,-->
<!--                    pointStyle: false,-->
<!--                    fill: true,-->
<!--                    borderWidth: 1-->
<!--                }]-->
<!--            }-->
<!--            let config = {-->
<!--                type: 'line',-->
<!--                data: data-->
<!--            }-->
<!--            let chart = new Chart(context, config);-->
<!--        }-->
<!---->
<!--        // Получение данных с сервера-->
<!--        function getCPUUtilization(){-->
<!--            axios.get('http://exercise.develop.maximaster.ru/service/cpu/')-->
<!--                .then((response)=>{-->
<!--                    let data = response.data.data;-->
<!--                    let xData = [];-->
<!--                    let yData = [];-->
<!--                    for (let i = data.length - 1; i > 0; i--){-->
<!--                        xData.push(data[i].date);-->
<!--                        yData.push(data[i].value);-->
<!--                    }-->
<!--                    createLineChart(xData, yData);-->
<!--                });-->
<!--        }-->
<!--        setInterval(getCPUUtilization, 5000);-->
<!--    </script>-->

<!--    <script>-->
<!--        // Получение контекста для рисования-->
<!--        let canvas = window.document.querySelector('canvas');-->
<!--        let context = canvas.getContext('2d');-->
<!--        // Функции-->
<!--        const createLineChart = (xData, yData) => {-->
<!--            let data = {-->
<!--                labels: xData,-->
<!--                datasets: [{-->
<!--                    label: 'Цена алюминия',-->
<!--                    data: yData,-->
<!--                    pointStyle: false,-->
<!--                    fill: true,-->
<!--                    borderWidth: 1-->
<!--                }]-->
<!--            }-->
<!--            let config = {-->
<!--                type: 'line',-->
<!--                data: data-->
<!--            }-->
<!--            let chart = new Chart(context, config);-->
<!--        }-->
<!---->
<!--        // Получение данных с сервера-->
<!--        axios.get('https://www.alphavantage.co/query?function=ALUMINUM&interval=monthly&apikey=demo')-->
<!--        .then((response)=>{-->
<!--            let data = response.data.data;-->
<!--            let xData = [];-->
<!--            let yData = [];-->
<!--            for (let i = data.length - 1; i > 0; i--){-->
<!--                if (data[i].value != '.'){ // убираем даты со значением '.'-->
<!--                    // console.log(`x = ${data[i].date}, y = ${data[i].value}`);-->
<!--                    xData.push(data[i].date);-->
<!--                    yData.push(data[i].value);-->
<!--                }-->
<!--            }-->
<!--            createLineChart(xData, yData);-->
<!--        });-->
<!--    </script>-->
</body>
</html>
