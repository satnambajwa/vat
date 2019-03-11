@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        
        <!-- Products sell and New Orders -->
        <div class="row match-height">
            <div class="col-xl-8 col-12" id="ecommerceChartView">
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
            <div class="col-xl-4 col-lg-12">
                <div class="card" style="height: 418px;">
                <div class="card-header">
                    <h4 class="card-title">New Orders</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div id="new-orders" class="media-list position-relative ps-container ps-theme-default" data-ps-id="4b7b7cb4-081f-2ed0-8d1d-7e1d7881cea7">
                        <div class="table-responsive">
                            <table id="new-orders-table" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Customers</th>
                                    <th class="border-top-0">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate">iPhone X</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-19.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-18.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-17.png" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                            <span class="badge badge-info">+4 more</span>
                                        </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$8999</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Pixel 2</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Alice Scott" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-16.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Charles Miller" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-15.png" alt="Avatar">
                                        </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$5550</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">OnePlus</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Christine Ramos" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-11.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Thomas Brewer" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-10.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Alice Chapman" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-9.png" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                            <span class="badge badge-info">+3 more</span>
                                        </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$9000</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Galaxy</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Ryan Schneider" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-14.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Tiffany Oliver" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-13.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joan Reid" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-12.png" alt="Avatar">
                                        </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$7500</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Moto Z2</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-8.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-7.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="assets/images/portrait/small/avatar-s-6.png" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                            <span class="badge badge-info">+1 more</span>
                                        </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$8500</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/ Products sell and New Orders -->
        <!-- Recent Transactions -->
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
        <!--Recent Orders & Monthly Sales -->
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
                <div class="card" style="height: 394px;">
                <div class="card-content">
                    <div class="card-body sales-growth-chart">
                        <div id="monthly-sales" class="height-250" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <svg height="250" version="1.1" width="551.797" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.390625px; top: -0.546875px;">
                            <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with RaphaÃ«l 2.2.0</desc>
                            <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                            <text x="42.84375" y="211" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                            </text>
                            <path fill="none" stroke="#e4e7ed" d="M55.34375,211.5H526.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="42.84375" y="164.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">750</tspan>
                            </text>
                            <path fill="none" stroke="#e4e7ed" d="M55.34375,164.5H526.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="42.84375" y="118" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1,500</tspan>
                            </text>
                            <path fill="none" stroke="#e4e7ed" d="M55.34375,118.5H526.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="42.84375" y="71.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,250</tspan>
                            </text>
                            <path fill="none" stroke="#e4e7ed" d="M55.34375,71.5H526.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="42.84375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">3,000</tspan>
                            </text>
                            <path fill="none" stroke="#e4e7ed" d="M55.34375,25.5H526.797" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="507.1531145833333" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Dec</tspan>
                            </text>
                            <text x="428.57757291666667" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Oct</tspan>
                            </text>
                            <text x="350.00203125" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Aug</tspan>
                            </text>
                            <text x="271.42648958333336" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jun</tspan>
                            </text>
                            <text x="192.85094791666668" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Apr</tspan>
                            </text>
                            <text x="114.27540625" y="223.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#bfbfbf" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Feb</tspan>
                            </text>
                            <rect x="69.09446979166667" y="97.23" width="11.78633125" height="113.77" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="108.382240625" y="64.928" width="11.78633125" height="146.072" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="147.6700114583333" y="120.542" width="11.78633125" height="90.458" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="186.95778229166666" y="131.082" width="11.78633125" height="79.918" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="226.245553125" y="108.886" width="11.78633125" height="102.114" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="265.5333239583333" y="77.328" width="11.78633125" height="133.672" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="304.82109479166667" y="97.23" width="11.78633125" height="113.77" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="344.10886562499996" y="64.928" width="11.78633125" height="146.072" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="383.3966364583333" y="120.542" width="11.78633125" height="90.458" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="422.6844072916667" y="131.082" width="11.78633125" height="79.918" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="461.97217812499997" y="108.886" width="11.78633125" height="102.114" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="501.2599489583333" y="77.328" width="11.78633125" height="133.672" rx="0" ry="0" fill="#ff394f" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            </svg>
                            <div class="morris-hover morris-default-style" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="chart-title mb-1 text-center">
                        <h6>Total monthly Sales.</h6>
                    </div>
                    <div class="chart-stats text-center">
                        <a href="#" class="btn btn-sm btn-danger box-shadow-2 mr-1">Statistics <i class="ft-bar-chart"></i></a> <span class="text-muted">for the last year.</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/Recent Orders & Monthly Sales -->
        <!-- Basic Horizontal Timeline -->
        <div class="row match-height">
            <div class="col-xl-4 col-lg-12">
                <div class="card" style="height: 684.344px;">
                <div class="card-header">
                    <h4 class="card-title">Basic Card</h4>
                </div>
                <div class="card-content">
                    <img class="img-fluid" src="assets/images/carousel/05.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                    <span class="float-left">3 hours ago</span>
                    <span class="float-right">
                    <a href="#" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                    </span>
                </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="card" style="height: 684.344px;">
                <div class="card-header">
                    <h4 class="card-title">Horizontal Timeline</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <section class="cd-horizontal-timeline loaded">
                            <div class="timeline">
                                <div class="events-wrapper">
                                    <div class="events" style="width: 1140px;">
                                        <ol>
                                        <li><a href="#0" data-date="16/01/2015" class="selected" style="left: 120px;">16 Jan</a></li>
                                        <li><a href="#0" data-date="28/02/2015" style="left: 300px;">28 Feb</a></li>
                                        <li><a href="#0" data-date="20/04/2015" style="left: 480px;">20 Mar</a></li>
                                        <li><a href="#0" data-date="20/05/2015" style="left: 600px;">20 May</a></li>
                                        <li><a href="#0" data-date="09/07/2015" style="left: 780px;">09 Jul</a></li>
                                        <li><a href="#0" data-date="30/08/2015" style="left: 960px;">30 Aug</a></li>
                                        <li><a href="#0" data-date="15/09/2015" style="left: 1020px;">15 Sep</a></li>
                                        </ol>
                                        <span class="filling-line" aria-hidden="true" style="transform: scaleX(0.12794);"></span>
                                    </div>
                                    <!-- .events -->
                                </div>
                                <!-- .events-wrapper -->
                                <ul class="cd-timeline-navigation">
                                    <li><a href="#0" class="prev inactive">Prev</a></li>
                                    <li><a href="#0" class="next">Next</a></li>
                                </ul>
                                <!-- .cd-timeline-navigation -->
                            </div>
                            <!-- .timeline -->
                            <div class="events-content">
                                <ol>
                                    <li class="selected" data-date="16/01/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-5.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="28/02/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-6.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="20/04/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="20/05/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-8.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="09/07/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-9.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="30/08/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-6.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="15/09/2015">
                                        <blockquote class="blockquote border-0">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object img-xl mr-1" src="assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                            </div>
                                        </div>
                                        <footer class="blockquote-footer text-right">Steve Jobs
                                            <cite title="Source Title">Entrepreneur</cite>
                                        </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                </ol>
                            </div>
                            <!-- .events-content -->
                            </section>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/ Basic Horizontal Timeline -->
    </div>
</div>
@endsection