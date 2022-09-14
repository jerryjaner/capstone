@extends('Admin.master')
@section('title')

Monthly Report

@endsection
@section('content')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 

<?php

  $month = array();
  $count = 0;
  while ($count <= 9) {

	$month [] = date('M Y', strtotime("-".$count."month"));
	$count ++;
  }
 // echo "<pre>"; print_r($month); die;

	$dataPoints = array(
		
		array("y" => $month_count[8], "label" => $month[8]),
		array("y" => $month_count[7], "label" => $month[7]),
		array("y" => $month_count[6], "label" => $month[6]),
		array("y" => $month_count[5], "label" => $month[5]),
		array("y" => $month_count[4], "label" => $month[4]),
	    array("y" => $month_count[3], "label" => $month[3]),
	    array("y" => $month_count[2], "label" => $month[2]),
		array("y" => $month_count[1], "label" => $month[1]),
		array("y" => $month_count[0], "label" => $month[0])


	// $dataPoints = array(
	// 	array("y" => 25, "label" => "Sunday"),
	// 	array("y" => 15, "label" => "Monday"),
	// 	array("y" => 25, "label" => "Tuesday"),
	// 	array("y" => 5, "label" => "Wednesday"),
	// 	array("y" => 10, "label" => "Thursday"),
	// 	array("y" => 0, "label" => "Friday"),
	// 	array("y" => 20, "label" => "Saturday")

		
	);
 
?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Monthly Orders"
	},
	axisY: {
		title: "Number Orders"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Order",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          
@endsection
