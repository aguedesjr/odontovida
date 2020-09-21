<!--<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/calendar.css">-->
<link href="lib/main.css" rel="stylesheet" />
<script src="lib/main.js"></script>
<script>

  document.addEventListener("DOMContentLoaded", function() {
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {

      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "listDay,listWeek"
      },

      // customize the button names,
      // otherwise they"d all just say "list"
      views: {
        listDay: { buttonText: "list day" },
        listWeek: { buttonText: "list week" }
      },

      initialView: "listWeek",
      initialDate: "2020-09-12",
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: "All Day Event",
          start: "2020-09-01"
        },
        {
          title: "Long Event",
          start: "2020-09-07",
          end: "2020-09-10"
        },
        {
          groupId: 999,
          title: "Repeating Event",
          start: "2020-09-09T16:00:00"
        },
        {
          groupId: 999,
          title: "Repeating Event",
          start: "2020-09-16T16:00:00"
        },
        {
          title: "Conference",
          start: "2020-09-11",
          end: "2020-09-13"
        },
        {
          title: "Meeting",
          start: "2020-09-12T10:30:00",
          end: "2020-09-12T12:30:00"
        },
        {
          title: "Lunch",
          start: "2020-09-12T12:00:00"
        },
        {
          title: "Meeting",
          start: "2020-09-12T14:30:00"
        },
        {
          title: "Happy Hour",
          start: "2020-09-12T17:30:00"
        },
        {
          title: "Dinner",
          start: "2020-09-12T20:00:00"
        },
        {
          title: "Birthday Party",
          start: "2020-09-13T07:00:00"
        },
        {
          title: "Click for Google",
          url: "http://google.com/",
          start: "2020-09-28"
        }
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

</style>

<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <h3 class="dashboard-section-title  text-center text-left-md w-100">Pandora <small>Version 1.0</small></h3>
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="#" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="#" class="page-link">Dashboard</a></li>
        </ul>
    </div>
</div>

<div id="calendar"></div>

<div class="m-3">
<!--<div data-role="panel" data-title-caption="Agenda" data-collapsible="false" data-title-icon='<span class="mif-calendar"></span>' class="mt-4">-->
    <div class="row">
        <div id="calendar"></div>
        <!--<div class="cell-md-8 p-10">

        
        </div>-->
    </div>

    <hr>
<!--</div>-->
</div>


<!--<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>-->