<!--<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
<link rel="stylesheet" href="css/calendar.css">

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

<div class="m-3">
<div data-role="panel" data-title-caption="Agenda" data-collapsible="false" data-title-icon="<span class='mif-calendar'></span>" class="mt-4">
    <div class="row">
        <div class="cell-md-8 p-10">
        <h5 class="text-center" >Event Calendar with jQuery, PHP and MySQL</h5>	
        <div class="page-header">
                <div class="pull-right form-inline">
                    <div class="btn-group">
                        <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                        <button class="btn btn-default" data-calendar-nav="today">Today</button>
                        <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-view="year">Year</button>
                        <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                        <button class="btn btn-warning" data-calendar-view="week">Week</button>
                        <button class="btn btn-warning" data-calendar-view="day">Day</button>
                    </div>
                </div>
                <h3></h3>
                <small>To see example with events navigate to Februray 2018</small>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div id="showEventCalendar"></div>
                </div>
                <div class="col-md-3">
                    <h4>All Events List</h4>
                    <ul id="eventlist" class="nav nav-list"></ul>
                </div>
            </div>	
            <!--<div class="container">	
            <h2>Event Calendar with jQuery, PHP and MySQL</h2>	
            <div class="page-header">
                <div class="pull-right form-inline">
                    <div class="btn-group">
                        <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                        <button class="btn btn-default" data-calendar-nav="today">Today</button>
                        <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-view="year">Year</button>
                        <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                        <button class="btn btn-warning" data-calendar-view="week">Week</button>
                        <button class="btn btn-warning" data-calendar-view="day">Day</button>
                    </div>
                </div>
                <h3></h3>
                <small>To see example with events navigate to Februray 2018</small>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div id="showEventCalendar"></div>
                </div>
                <div class="col-md-3">
                    <h4>All Events List</h4>
                    <ul id="eventlist" class="nav nav-list"></ul>
                </div>
            </div>	
            <div style="margin:50px 0px 0px 0px;">
                <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/create-event-calendar-with-jquery-php-and-mysql/">Back to Tutorial</a>		
            </div>
            </div>-->
        </div>
    </div>

    <hr>
</div>
</div>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>