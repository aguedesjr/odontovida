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
<div data-role="panel" data-title-caption="Monthly Recap Report" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>" class="mt-4">
    <div class="row">
        <div class="cell-md-8 p-10">
            <h5 class="text-center">Sales: 1 Jan, 2014 - 30 Jul, 2014</h5>
            <canvas id="dashboardChart1"></canvas>
        </div>
        <div class="cell-md-4 p-10">
            <h5 class="text-center">Goal Completion</h5>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Add Products to Cart</div>
                    <div class="place-right"><strong>160</strong>/200</div>
                </div>
                <div data-role="progress" data-value="35" data-cls-bar="bg-cyan"></div>
            </div>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Complete Purchase</div>
                    <div class="place-right"><strong>310</strong>/400</div>
                </div>
                <div data-role="progress" data-value="35" data-cls-bar="bg-red"></div>
            </div>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Visit Premium Page</div>
                    <div class="place-right"><strong>480</strong>/800</div>
                </div>
                <div data-role="progress" data-value="35"></div>
            </div>
            <div class="mt-6">
                <div class="clear">
                    <div class="place-left">Send Inquiries</div>
                    <div class="place-right"><strong>250</strong>/500</div>
                </div>
                <div data-role="progress" data-value="35" data-cls-bar="bg-orange"></div>
            </div>
            <div class="mt-6">
                <p class="text-small">Cum brodium resistere, omnes spatiies perdere varius, magnum lanistaes.</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-green"><span class="mif-arrow-drop-up"></span>17%</div>
            <div class="text-bold">$35,210.43</div>
            <div class="text-upper">TOTAL REVENUE</div>
        </div>
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-orange"><span class="">=</span>0</div>
            <div class="text-bold">$10,390.90</div>
            <div class="text-upper">TOTAL COST</div>
        </div>
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-green"><span class="mif-arrow-drop-up"></span>20%</div>
            <div class="text-bold">$24,813.53</div>
            <div class="text-upper">TOTAL PROFIT</div>
        </div>
        <div class="cell-lg-3 cell-sm-6 text-center mt-4">
            <div class="fg-red"><span class="mif-arrow-drop-down"></span>18%</div>
            <div class="text-bold">1,200</div>
            <div class="text-upper">GOAL COMPLETIONS</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="cell-md-7">
        <div data-role="panel" data-title-caption="Staff salary" data-collapsible="true" data-title-icon="<span class='mif-table'></span>" class="mt-4">
            <div class="p-4">
                <table class="table striped table-border mt-4"
                       data-role="table"
                       data-cls-table-top="row"
                       data-cls-search="cell-md-6"
                       data-cls-rows-count="cell-md-6"
                       data-rows="5"
                       data-rows-steps="5, 10"
                       data-show-activity="false"
                       data-source="Pandora/source/data/table.json"
                       data-horizontal-scroll="true"
                >
                </table>
            </div>
        </div>
    </div>

    <div class="cell-md-5">
        <div data-role="panel" data-title-caption="New members" data-collapsible="true" data-title-icon="<span class='mif-users'></span>" class="mt-4">
            <ul class="user-list">
                <li>
                    <img src="Pandora/source/images/user1-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Sergey</div>
                    <div class="text-small text-muted">Today</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user2-160x160.jpg" class="avatar">
                    <div class="text-ellipsis">Alex</div>
                    <div class="text-small text-muted">Yesterday</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user3-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Norma</div>
                    <div class="text-small text-muted">Yesterday</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user4-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Katty</div>
                    <div class="text-small text-muted">11 Jan</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user5-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Julia</div>
                    <div class="text-small text-muted">11 Jan</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user6-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Mark</div>
                    <div class="text-small text-muted">11 Jan</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user7-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Marta</div>
                    <div class="text-small text-muted">11 Jan</div>
                </li>
                <li>
                    <img src="Pandora/source/images/user8-128x128.jpg" class="avatar">
                    <div class="text-ellipsis">Ustas</div>
                    <div class="text-small text-muted">11 Jan</div>
                </li>
            </ul>
            <div class="p-2 border-top bd-default text-center">
                <a href="#">View all users</a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="Pandora/source/js/charts.js"></script>