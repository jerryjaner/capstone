@extends('Admin.master')
@section('title')

Monthly Report

@endsection
@section('content')

<?php


$month = array();
$count = 0;
while ($count <= 1) {

	$month [] = date('M Y', strtotime("-".$count."month"));
	$count++;
}
 echo "<pre>"; print_r($month); die;

$dataPoints = array(
	

    array("y" => 25, "label" => "Sunday"),
	array("y" => 15, "label" => "Monday"),
	array("y" => 25, "label" => "Tuesday"),
	array("y" => 10000, "label" => "Wednesday"),
	array("y" => 10, "label" => "Thursday"),
	array("y" => 0, "label" => "Friday"),
	array("y" => 20, "label" => "Saturday")
	
);
 
?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Monthly Report"
	},
	axisY: {
		title: "Number of Orders"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          
@endsection
