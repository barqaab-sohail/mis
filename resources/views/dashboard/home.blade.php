@extends('layouts.master.master')
@section('title', 'BARQAAB MIS')


@section('Heading')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
 
	

	<h3 class="text-themecolor">Dashboard</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
		
		
	</ol>

@stop
@section('content')

	<div class="card">
		<div class="card-body">
			<!--<div class="float-right">
				<input id="month" class="form-control" value="" type="month">
			</div>
			<h4 class="card-title">Salaries</h4>
			-->
			
			<h2 >{{ucwords (Auth::User()->hrEmployee->first_name??'')}} {{ucwords(Auth::User()->hrEmployee->last_name??'')}} Welcome to MIS</h2>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div id="ageChart" style="height: 500px;"></div>
			</div>
			<div class="col-sm-6">
				<div id="ageChart2" style="height: 500px;"></div>
			</div>	
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div id="categoryChart" style="height: 500px;"></div>
			</div>
			<div class="col-sm-6">
				<div id="departmentChart" style="height: 500px;"></div>
			</div>	
		</div>
	</div>



<!-- Charting library -->
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<!-- chartjs-plugin-datalabels -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<!-- Your application script -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script>


  const ageChart = new Chartisan({
    el: '#ageChart',
    url: "@chart('age_chart')",
  });

  const ageChart2 = new Chartisan({
    el: '#ageChart2',
    url: "@chart('age_chart')",
    hooks: new ChartisanHooks()
        .datasets('pie')
        .responsive()
        .legend({ position: 'bottom' })
    	.pieColors()
  });

 

</script>

@stop

@section('footer')

@stop

