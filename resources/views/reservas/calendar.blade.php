<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <style>
        .month {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .month .prev,
        .month .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .month .prev {
            left: 0;
        }
        .month .next {
            right: 0;
        }
        .month-title {
            text-align: center;
        }
        .weekdays, .days {
            list-style: none;
            padding: 0;
        }
        .days li {
            display: inline-block;
            width: 14.28%;
            text-align: center;
            cursor: pointer;
        }
        .days li.selected {
            background-color: #ADD8E6;
        }
    </style>
</head>
<body>
    <div class="calendar">
        <div class="month">
            <li class="prev" onclick="previousMonth()">&#10094;</li>
            <div class="month-title" id="month-title">
                <!-- Aquí se inserta dinámicamente el mes y año -->
            </div>
            <li class="next" onclick="nextMonth()">&#10095;</li>
        </div>
        <ul class="weekdays">
            <li>Lunes</li>
            <li>Martes</li>
            <li>Miércoles</li>
            <li>Jueves</li>
            <li>Viernes</li>
            <li>Sábado</li>
            <li>Domingo</li>
        </ul>
        <ul class="days" id="days">
            <!-- Aquí se insertan dinámicamente los días del mes -->
        </ul>
    </div>
    <script>
        const monthTitleEl = document.getElementById('month-title');
        const daysEl = document.getElementById('days');

        let currentDate = new Date();

        function renderCalendar(date) {
            const month = date.getMonth();
            const year = date.getFullYear();

            let firstDay = new Date(year, month, 1).getDay();
            firstDay = firstDay === 0 ? 7 : firstDay; // Ajustar para que Lunes sea 1 y Domingo sea 7
            const lastDay = new Date(year, month + 1, 0).getDate();

            const months = [
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ];

            monthTitleEl.innerHTML = `${months[month]}<br><span style="font-size:18px">${year}</span>`;

            daysEl.innerHTML = '';

            for (let i = 1; i < firstDay; i++) {
                const emptyDay = document.createElement('li');
                daysEl.appendChild(emptyDay);
            }

            for (let i = 1; i <= lastDay; i++) {
                const day = document.createElement('li');
                day.textContent = i;
                day.onclick = () => selectDay(day);
                daysEl.appendChild(day);
            }
        }

        function selectDay(dayElement) {
            const selected = document.querySelector('.days .selected');
            if (selected) {
                selected.classList.remove('selected');
            }
            dayElement.classList.add('selected');
        }

        function previousMonth() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        }

        function nextMonth() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        }

        renderCalendar(currentDate);
    </script>
</body>
</html>
