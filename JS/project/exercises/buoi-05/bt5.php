<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <style>
        .calendarsd {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            font-family: Arial, sans-serif;
        }

        .month,
        .year,
        .weekdays,
        .days {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .days div {
            cursor: pointer;
        }

        .day {
            font-weight: bold;
        }

        .calendar {
            width: 400px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .calendar-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .calendar-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-inputs {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .date-inputs label {
            width: 40px;
            text-align: right;
        }

        .date-inputs input,
        .date-inputs button {
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-left: 5px;
        }

        .date-display {
            text-align: center;
        }

        #output {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="calendarsd">
        <div class="month"></div>
        <div class="year"></div>
        <div class="days">
        </div>
        <div class="weekdays">
        </div>
    </div>
    <div class="calendar">
        <div class="calendar-header">
            <h1>Lịch</h1>
        </div>
        <div class="calendar-body">
            <div class="date-inputs">
                <label for="day">Ngày:</label>
                <input type="number" id="day" min="1" max="31" required>
                <label for="month">Tháng:</label>
                <input type="number" id="month" min="1" max="12" required>
                <label for="year">Năm:</label>
                <input type="number" id="year" min="1000" max="9999" required>
                <button type="button" id="show-date">In lịch</button>
            </div>
        </div>
    </div>
    <script>
        const dayInput = document.getElementById('day');
        const monthInput = document.getElementById('month');
        const yearInput = document.getElementById('year');
        const showDateButton = document.getElementById('show-date');
        const monthDisplay = document.querySelector('.month');
        const yearDisplay = document.querySelector('.year');
        const outputDays = document.querySelector('.days');
        const outputWeekdays = document.querySelector('.weekdays');

        showDateButton.addEventListener('click', () => {
            const day = parseInt(dayInput.value, 10);
            const month = parseInt(monthInput.value, 10) - 1;
            const year = parseInt(yearInput.value, 10);

            if (isNaN(day) || isNaN(month) || isNaN(year)) {
                // Display error message or handle invalid input
                return;
            }

            const date = new Date(year, month, day);

            if (date.getDate() !== day || date.getMonth() !== month || date.getFullYear() !== year) {
                // Display error message for invalid date
                return;
            }

            const dayOfWeek = date.toLocaleDateString('vi-VN', {
                weekday: 'long'
            });
            const monthName = date.toLocaleDateString('vi-VN', {
                month: 'long'
            });

            // Display individual components in corresponding divs
            monthDisplay.textContent = `${monthName}`;
            yearDisplay.textContent = `${year}`;

            // Optionally, you can display other information like days and weekdays
            outputDays.textContent = `${day}`;
            outputWeekdays.textContent = `${dayOfWeek}`;
        });
    </script>
</body>

</html>