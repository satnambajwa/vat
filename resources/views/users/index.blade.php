@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <div class="container">
        <!-- Products sell and New Orders -->
        <div class="col-xl-12 col-lg-12 ">
        <div class="row match-height">
            <div class="col-xl-6 col-lg-12">
                <div class="card" style="height: 418px;">
                    @php
                    $label=   array();
                    $dat=   array();
                    $col=   array();

                        foreach($data as $key=>$val){
                            $label[]    =   $key;
                            $dat[]      =   $val;
                            $col[]      =   'rgba('.rand(10,255).', '.rand(50,200).', '.rand(20,100).', 0.4)';
                        }
                    @endphp
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
                    <canvas id="myChart" width="400" height="250"></canvas>
                    <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["{!! implode('","',$label) !!}"],
                            datasets: [{
                                label: 'Invoices',
                                data:[{!! implode(',',$dat) !!}],
                                backgroundColor:["{!! implode('","',$col) !!}"],
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
            <div class="col-xl-6 col-lg-12">
                <div class="card" style="height: 418px;">
                    @php
                    $label1=   array();
                    $dat1=   array();
                    $col1=   array();
                        foreach($bdata as $key=>$val){
                            $label1[]  =   $key;
                            $dat1[]   =   $val;
                            $col1[]      =   'rgba('.rand(10,255).', '.rand(50,200).', '.rand(20,100).', 0.4)';
                        }
                    @endphp
                    <canvas id="myChart1" width="400" height="250"></canvas>
                    <script>
                    var ctx = document.getElementById('myChart1').getContext('2d');
                    var myChart1 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["{!! implode('","',$label1) !!}"],
                            datasets: [{
                                label: 'Bill To Pay',
                                data:[{!! implode(',',$dat1) !!}],
                                backgroundColor:["{!! implode('","',$col1) !!}"],
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
        </div>
    </div>
</div>
</div>
@endsection