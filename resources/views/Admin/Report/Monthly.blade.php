@extends('Admin.master')
@section('title')

Monthly Report

@endsection
@section('content')



 

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
		title: "Number of Orders"
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
