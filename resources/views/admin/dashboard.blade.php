@extends('admin.layouts.master')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title page-title">Dashboard</h4>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-white bg-success">
                                    <div class="card-header font-weight-bold text-uppercase">Today Sale</div>
                                        <div class="card-inner">
                                            <div class="card-title font-weight-bold text-uppercase h5 mb-0">$ 2580</div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-white bg-purple">
                                    <div class="card-header font-weight-bold text-uppercase">Today Orders</div>
                                        <div class="card-inner">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-white bg-blue">
                                    <div class="card-header font-weight-bold text-uppercase">Today Ticket Listing</div>
                                        <div class="card-inner">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-white bg-danger">
                                    <div class="card-header font-weight-bold text-uppercase">Today Subscription</div>
                                        <div class="card-inner">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-xxl-4">
                                <div class="row g-gs">
                                    <div class="col-xxl-4 col-lg-6">
                                        <div class="card h-100">
                                            <div class="nk-ecwg nk-ecwg5">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start pb-3 g-2">
                                                        <div class="card-title">
                                                            <h6 class="title">Monthly Report</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help" data-toggle="tooltip" data-placement="left" title="Users of this month"></em>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div id="chart_div"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    <div class="col-xxl-12 col-md-6">
                                        <div class="card">
                                            <div class="nk-ecwg nk-ecwg3">
                                                <div class="card-inner pb-0">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Order Status</h6>
                                                        </div>
                                                    </div>
                                                    <div class="data">
                                                        <div class="data-group">
                                                            <span id="donutchart" style="width: 400px; height: 300px;"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                            </div><!-- .nk-ecwg -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                            <div class="col-xxl-8" style="padding-top: 30px">
                                <div class="card card-full">
                                    <div class="nk-ecwg nk-ecwg8 h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-3">
                                                <div class="card-title">
                                                    <h6 class="title">Yearly Sales</h6>
                                                </div>
                                            </div>
                                            <div id="area_chart" style="width: 100%; height: 300px;"></div>
                                        </div><!-- .card-inner -->
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            {{-- <div class="col-xxl-8" style="padding-top: 30px">
                                <div class="card card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Stock out product list</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                <tr class="nk-tb-item nk-tb-head">
                                                    <th class="nk-tb-col"><span class="sub-text">Product name</span></th>
                                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Stock</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Brand name</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Price</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Category name</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Quantity</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Image</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Approval</span></th>
                                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .card -->
                            </div> --}}
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
    {{-- <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $chartData ?>
            ]);

            var options = {
                title: 'Total order Status Report',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }

        //column chart

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'orders'],
                <?php echo $monthly_orders ?>
            ]);

            var options = {
                title : 'Monthly Orders Report',
                vAxis: {title: 'Orders'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script>
        //Area chart

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Orders'],
                <?php echo $yearly_orders ?>
            ]);

            var options = {
                title: 'Yearly Orders Report',
                hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('area_chart'));
            chart.draw(data, options);
        }
    </script> --}}
@endsection
