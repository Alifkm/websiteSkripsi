@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 mb-5">
      <div class="card">
        <div class="card-header">Grafik laba rugi bulanan</div>
        <div class="card-body">
          <div id="chartMonth"></div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Grafik laba rugi tahunan</div>
        <div class="card-body">
          <div id="chartYear"></div>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  var income = <?php echo json_encode($totalLaba) ?>;
  var month =  <?php echo json_encode($month) ?>;
  Highcharts.chart('chartMonth', {
    title: {
      text: 'Grafik laba rugi bulanan'
    },
    xAxis: {
      categories: month
    },
    yAxis: {
      title: {
        text: 'Nominal laba rugi bulanan'
      }
    },
    plotOptions: {
      series: {
        allowPointSelect: true
      }
    },
    series: [
      {
        name: 'Nominal laba rugi',
        data: income
      }
    ]
  });
</script>

<script type="text/javascript">
  var labaYear = <?php echo json_encode($totalLabaYear) ?>;
  var year =  <?php echo json_encode($year) ?>;
  Highcharts.chart('chartYear', {
    title: {
      text: 'Grafik laba rugi tahunan'
    },
    xAxis: {
      categories: year
    },
    yAxis: {
      title: {
        text: 'Nominal laba rugi tahunan'
      }
    },
    plotOptions: {
      series: {
        allowPointSelect: true
      }
    },
    series: [
      {
        name: 'Nominal laba rugi',
        data: labaYear
      }
    ]
  });
</script>
@endsection