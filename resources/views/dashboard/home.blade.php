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
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<!-- Your application script -->
<script>
  const ageChart = new Chartisan({
    el: '#ageChart',
    url: "@chart('age_chart')",
  });

  const ageChart2 = new Chartisan({
    el: '#ageChart2',
    url: "@chart('age_chart')",
    hooks: new ChartisanHooks()
            .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
            .datasets('pie')
           
            .axis(false)
  });



</script>

@stop

@section('footer')

@stop

