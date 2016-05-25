@extends('hrMaster') 

@section('urlTitles')
<?php session(['title' => 'Home']);
session(['subtitle' => '']); ?>
@endsection
<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="/hr_assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
    <link href="/hr_assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
    <link href="/hr_assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/hr_assets/plugins/morris/morris.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->

@section('content')
<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="javascript:;">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Dashboard <small>Clients and contacts</small></h1>
            <!-- end page-header -->
            
            <!-- begin row -->
            <div class="row">
                 @if (session('warning'))
                                    <div class="alert alert-danger">
                                        {{ session('warning') }}   
                                    </div>
                                @endif
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-green">
                        <div class="stats-icon"><i class="fa fa-bank"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL CLIENTS</h4>
                            <p>{{ $totalClients }}</p>    
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">  <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-blue">
                        <div class="stats-icon"><i class="fa fa-users"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL CONTACTS</h4>
                            <p>{{ $totalContacts }}</p>   
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;"> <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-purple">
                        <div class="stats-icon"><i class="fa fa-shield"></i></div>
                        <div class="stats-info">
                            <h4>NEW CLIENTS</h4>
                            <p>{{ $newClients }}</p>    
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;"> <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-red">
                        <div class="stats-icon"><i class="fa fa-phone"></i></div>
                        <div class="stats-info">
                            <h4>NEW CALLS</h4>
                            <p>{{ $newCalls }}</p> 
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;"> <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->

          <!-- begin row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="widget-chart with-sidebar bg-black">
                        <div class="widget-chart-content">
                            <h4 class="chart-title">
                                Clients Call Analytics
                                <small>Where do our clients come from</small>
                            </h4>
                            <div id="line-all" class="morris-inverse" style="height: 260px;"></div>
                        </div>
                        <div class="widget-chart-sidebar bg-black-darker">
                            <div class="chart-number">
                                Clients Industry
                                <small> </small>
                            </div>
                            <div id="industry-donut-chart" style="height: 230px"></div>
                            <ul class="chart-legend">
                                <li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i> {{ ($newClients/$totalClients)*100 }}% <span>New Clients</span></li>
                                 
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Clients Origin
                            </h4>
                        </div>
                        <div id="clients-map" class="bg-black" style="height: 181px;"></div>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
                                <span class="badge badge-success">40.95%</span>
                                1. United Arab Emirates 
                            </a> 
                            <a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
                                <span class="badge badge-primary">26.12%</span>
                                2. Saudi Arabia
                            </a>
                            <a href="#" class="list-group-item list-group-item-inverse text-ellipsis">
                                <span class="badge badge-inverse">14.99%</span>
                                3. Qatar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            
            <!-- end row --></div>
        </div>  

        <script>

        $(document).ready(function() { 

            Morris.Donut({
              element: 'industry-donut-chart',
              data: [
              @foreach ($industries as $industry)
                  {label: "{{ str_replace("&", "n", $industry->industryName) }}", value: {{ $industry->counter }} },
              @endforeach
               
                               
              ],
              backgroundColor:"#242a30",
              colors:["#808000","#008080","#056DAD","#000080","#800080","#800000","#FF0000","#DBE50B","#CD5C5C","#D4AC0D","#A569BD","#A2D9CE"],
              labelFamily:"Open Sans",
              labelColor:"fff",
              labelTextSize:"12px",
            });
// --------------------------------------------------------------------------------
    Morris.Line({
  element: 'line-all',
  data: [
    { y: '2006', a: 104, b: 90, c:80 },
    { y: '2007', a: 75,  b: 65, c:150},
    { y: '2008', a: 50,  b: 40, c:70 },
    { y: '2009', a: 75,  b: 65, c:100 },
    { y: '2010', a: 50,  b: 40, c:20 },
    { y: '2011', a: 75,  b: 65, c:10 },
    { y: '2012', a: 100, b: 90, c:3 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['Series A', 'Series B', 'Series C']
});

            // --------------------------------------------------------------------------------
             $(function(){
                  $('#clients-map').vectorMap(
                    {map: 'world_merc_en',
                    scaleColors:["#e74c3c","#0071a4"],
                    container:$("#visitors-map"),
                    normalizeFunction:"linear",
                    hoverOpacity:.5,
                    hoverColor:false,
                    markerStyle:{initial:{fill:"#4cabc7",stroke:"transparent",r:3}},
                    regions:[{attribute:"fill"}],
                    regionStyle:{initial:{fill:"rgb(97,109,125)","fill-opacity":1,stroke:"none","stroke-width":.4,"stroke-opacity":1},hover:{"fill-opacity":.8},selected:{fill:"yellow"},selectedHover:{}},
                    series:{regions:[{values:{SA:"#056DAD",QA:"#808000",AE:"#0facac",IN:"#00acac"}}]},focusOn:{x:.6,y:.6,scale:6},backgroundColor:"#2d353c" }
                    );
                });

           // --------------------------------------------------------------------------------  
           }); 



    </script>
        @endsection

      <!--   var handleVisitorsVectorMap=function(){if($("#visitors-map").length!==0){map=new jvm.WorldMap({map:"world_merc_en",scaleColors:["#e74c3c","#0071a4"],container:$("#visitors-map"),normalizeFunction:"linear",hoverOpacity:.5,hoverColor:false,markerStyle:{initial:{fill:"#4cabc7",stroke:"transparent",r:3}},regions:[{attribute:"fill"}],regionStyle:{initial:{fill:"rgb(97,109,125)","fill-opacity":1,stroke:"none","stroke-width":.4,"stroke-opacity":1},hover:{"fill-opacity":.8},selected:{fill:"yellow"},selectedHover:{}},series:{regions:[{values:{IN:"#00acac",US:"#00acac",AE:"#00acac"}}]},focusOn:{x:.5,y:.5,scale:2},backgroundColor:"#2d353c"})}}; -->