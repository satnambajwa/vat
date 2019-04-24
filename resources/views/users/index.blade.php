@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        
        <!-- Products sell and New Orders -->
        <!--
        <div class="row match-height">
            <div class="col-xl-6 col-12" id="ecommerceChartView">
                <div class="card card-shadow" style="height: 418px;">
                <div class="card-header card-header-transparent py-20">
                    <div class="btn-group dropdown">
                        <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS SALES</a>
                        <div class="dropdown-menu animate" role="menu">
                            <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                            <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                            <a class="dropdown-item" href="#" role="menuitem">profit</a>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                        <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
                    </ul>
                </div>
                <div class="widget-content tab-content bg-white p-20">
                    <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay">
                        <div class="chartist-tooltip" style="top: 109.953px; left: 24.2031px;"></div>
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="300" class="ct-chart-line" style="width: 100%; height: 300px;">
                            <g class="ct-grids">
                            <line y1="265" y2="265" x1="50" x2="1192.59375" class="ct-grid ct-vertical"></line>
                            <line y1="193.57142857142856" y2="193.57142857142856" x1="50" x2="1192.59375" class="ct-grid ct-vertical"></line>
                            <line y1="122.14285714285714" y2="122.14285714285714" x1="50" x2="1192.59375" class="ct-grid ct-vertical"></line>
                            <line y1="50.71428571428572" y2="50.71428571428572" x1="50" x2="1192.59375" class="ct-grid ct-vertical"></line>
                            </g>
                            <g>
                            <g ct:series-name="series-1" class="ct-series ct-series-a">
                                <path d="M 50 265 C 131.614 265 131.614 104.286 213.228 104.286 C 294.842 104.286 294.842 172.143 376.455 172.143 C 458.069 172.143 458.069 47.143 539.683 47.143 C 621.297 47.143 621.297 172.143 702.911 172.143 C 784.525 172.143 784.525 32.857 866.138 32.857 C 947.752 32.857 947.752 150.714 1029.37 150.714 C 1110.98 150.714 1110.98 22.143 1192.59 22.143" class="ct-line" filter="url(#shadowscoreLineToDay)"></path>
                            </g>
                            </g>
                            <g class="ct-labels">
                                <foreignObject style="overflow: visible;" x="50" y="270" width="163.22767857142858" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">1st</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="213.22767857142858" y="270" width="163.22767857142858" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">2nd</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="376.45535714285717" y="270" width="163.2276785714286" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">3rd</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="539.6830357142858" y="270" width="163.22767857142856" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">4th</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="702.9107142857143" y="270" width="163.22767857142856" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">5th</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="866.1383928571429" y="270" width="163.22767857142867" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">6th</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="1029.3660714285716" y="270" width="163.22767857142844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 163px; height: 20px;">7th</span></foreignObject>
                                <foreignObject style="overflow: visible;" x="1192.59375" y="270" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">8th</span></foreignObject>
                                <foreignObject style="overflow: visible;" y="193.57142857142856" x="10" height="71.42857142857143" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 71px; width: 30px;">0K</span></foreignObject>
                                <foreignObject style="overflow: visible;" y="122.14285714285712" x="10" height="71.42857142857143" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 71px; width: 30px;">2K</span></foreignObject>
                                <foreignObject style="overflow: visible;" y="50.71428571428572" x="10" height="71.42857142857142" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 71px; width: 30px;">4K</span></foreignObject>
                                <foreignObject style="overflow: visible;" y="15" x="10" height="35.71428571428572" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 36px; width: 30px;">6K</span></foreignObject>
                            </g>
                            <defs>
                            <filter x="0" y="-10%" id="shadowscoreLineToDay">
                                <feGaussianBlur in="SourceAlpha" stdDeviation="24" result="offsetBlur"></feGaussianBlur>
                                <feOffset dx="0" dy="32"></feOffset>
                                <feBlend in="SourceGraphic" mode="multiply"></feBlend>
                            </filter>
                            <linearGradient id="scoreLineToDay-gradient" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0" stop-color="rgba(22, 141, 238, 1)"></stop>
                                <stop offset="1" stop-color="rgba(98, 188, 246, 1)"></stop>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                    <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card" style="height: 418px;">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<canvas id="myChart" width="400" height="250"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datasets: [{
            label: 'Cash Flow',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
                </div>
            </div>
        </div>
        <!--/ Products sell and New Orders -->
        <!-- 
        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Transactions</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                            <tr>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Invoice#</th>
                                <th class="border-top-0">Customer Name</th>
                                <th class="border-top-0">Products</th>
                                <th class="border-top-0">Categories</th>
                                <th class="border-top-0">Shipping</th>
                                <th class="border-top-0">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate"><a href="#">INV-001001</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                    <img class="box-shadow-2" src="assets/images/portrait/small/avatar-s-4.png" alt="avatar">
                                    </span>
                                    <span>Elizabeth W.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-1.jpg" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-2.jpg" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-4.jpg" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                        <span class="badge badge-info">+1 more</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-truncate">$ 1200.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i> Declined</td>
                                <td class="text-truncate"><a href="#">INV-001002</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                    <img class="box-shadow-2" src="assets/images/portrait/small/avatar-s-5.png" alt="avatar">
                                    </span>
                                    <span>Doris R.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-5.jpg" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-6.jpg" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                        <span class="badge badge-info">+2 more</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-warning round">Electronics</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-truncate">$ 1850.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i> Pending</td>
                                <td class="text-truncate"><a href="#">INV-001003</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                    <img class="box-shadow-2" src="assets/images/portrait/small/avatar-s-6.png" alt="avatar">
                                    </span>
                                    <span>Megan S.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-2.jpg" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-5.jpg" alt="Avatar">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-success round">Groceries</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-truncate">$ 3200.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate"><a href="#">INV-001004</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                    <img class="box-shadow-2" src="assets/images/portrait/small/avatar-s-7.png" alt="avatar">
                                    </span>
                                    <span>Andrew D.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-6.jpg" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-1.jpg" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                        <span class="badge badge-info">+1 more</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-info round">Apparels</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-truncate">$ 4500.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate"><a href="#">INV-001005</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                    <img class="box-shadow-2" src="assets/images/portrait/small/avatar-s-9.png" alt="avatar">
                                    </span>
                                    <span>Walter R.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-5.jpg" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                        <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="assets/images/portfolio/portfolio-3.jpg" alt="Avatar">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-truncate">$ 1500.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/ Recent Transactions -->


        <!--Recent Orders & Monthly Sales 
        <div class="row match-height">
            <div class="col-xl-8 col-lg-12">
                <div class="card" style="height: 394px;">
                    <div class="card-content ">
                        <div id="cost-revenue" class="height-250 position-relative">
                            <div class="chartist-tooltip"></div>
                            <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;">
                                <g class="ct-grids"></g>
                                <g>
                                <g class="ct-series ct-series-a">
                                    <path d="M0,250L0,187.5C45.096,195.833,90.192,212.5,135.288,212.5C180.384,212.5,225.48,175,270.576,175C315.672,175,360.769,212.5,405.865,212.5C450.961,212.5,496.057,150,541.153,150C586.249,150,631.345,187.5,676.441,187.5C721.537,187.5,766.633,164.286,811.729,150C856.825,135.714,901.921,100,947.017,100C992.113,100,1037.209,162.5,1082.306,162.5C1127.402,162.5,1172.498,104.167,1217.594,75L1217.594,250Z" class="ct-area" style="fill: #28D094; fill-opacity: 0.2"></path>
                                    <path d="M0,187.5C45.096,195.833,90.192,212.5,135.288,212.5C180.384,212.5,225.48,175,270.576,175C315.672,175,360.769,212.5,405.865,212.5C450.961,212.5,496.057,150,541.153,150C586.249,150,631.345,187.5,676.441,187.5C721.537,187.5,766.633,164.286,811.729,150C856.825,135.714,901.921,100,947.017,100C992.113,100,1037.209,162.5,1082.306,162.5C1127.402,162.5,1172.498,104.167,1217.594,75" class="ct-line" style="fill: transparent; stroke: #28D094; stroke-width: 4px;"></path>
                                    <circle cx="0" cy="187.5" r="7" class="ct-area-circle"></circle>
                                    <circle cx="135.28819444444446" cy="212.5" r="7" class="ct-area-circle"></circle>
                                    <circle cx="270.5763888888889" cy="175" r="7" class="ct-area-circle"></circle>
                                    <circle cx="405.86458333333337" cy="212.5" r="7" class="ct-area-circle"></circle>
                                    <circle cx="541.1527777777778" cy="150" r="7" class="ct-area-circle"></circle>
                                    <circle cx="676.4409722222223" cy="187.5" r="7" class="ct-area-circle"></circle>
                                    <circle cx="811.7291666666667" cy="150" r="7" class="ct-area-circle"></circle>
                                    <circle cx="947.0173611111112" cy="100" r="7" class="ct-area-circle"></circle>
                                    <circle cx="1082.3055555555557" cy="162.5" r="7" class="ct-area-circle"></circle>
                                    <circle cx="1217.59375" cy="75" r="7" class="ct-area-circle"></circle>
                                </g>
                                </g>
                                <g class="ct-labels"></g>
                            </svg>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row mt-1">
                            <div class="col-3 text-center">
                                <h6 class="text-muted">Total Products</h6>
                                <h2 class="block font-weight-normal">18.6 k</h2>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <h6 class="text-muted">Total Sales</h6>
                                <h2 class="block font-weight-normal">64.54 M</h2>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <h6 class="text-muted">Total Cost</h6>
                                <h2 class="block font-weight-normal">24.38 B</h2>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <h6 class="text-muted">Total Revenue</h6>
                                <h2 class="block font-weight-normal">36.72 M</h2>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                
            </div>
        </div>
        <!--/Recent Orders & Monthly Sales -->
        
    </div>
</div>
@endsection