<?php
  include 'Calendar.php';
  $calendar = new Calendar('2023-05-07');
  $calendar->add_event('13:00', '2023-06-03', 1, 'green');
  $calendar->add_event('Doctors', '2023-05-04', 1, 'red');
  $calendar->add_event('Doctor', '2023-05-04', 1, 'red');
  $calendar->add_event('Holiday', '2023-05-16', 7);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="calendar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="calandar.js"></script>
	</head>
	<body onload="myFunction()">
    <div id = "calandar">
      <div class="content home">
        <div class = "calendar" id = "calendar">
          <div class = "days" id = "calendar-header">
          </div>
          <div class = "days" id = "calendar-content">
          </div>
          <div id = "seemore"></div> 
        </div>
        </div>
      </div>
    </div>
	</body>
</html>
