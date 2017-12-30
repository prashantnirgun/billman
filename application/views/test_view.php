<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/adminlte'); ?>/plugins/countdown/flipclock.css" />

	<!-- JavaSript Begins -->
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url('asset/adminlte'); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url('asset/adminlte'); ?>/plugins/countdown/flipclock.js"></script>

	<style text="text/css">
	body .flip-clock-wrapper ul li a div div.inn, body .flip-clock-small-wrapper ul li a div div.inn { color: #CCCCCC; background-color: #333333; } body .flip-clock-dot, body .flip-clock-small-wrapper .flip-clock-dot { background: #323434; } body .flip-clock-wrapper .flip-clock-meridium a, body .flip-clock-small-wrapper .flip-clock-meridium a { color: #323434; }
	</style>

</head>
<body>
<br/><br/><br/>
<div class="clock-builder-output"></div>




<script type="text/javascript">
$(function(){
	FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
	var opts = {
		clockFace: 'DailyCounter',
		countdown: true,
		language: 'Custom'
	};
	//new Date(year, month, day, hours, minutes, seconds, milliseconds)
	//var end_time = (new Date().getTime() / 1000 ) + 10;
	
	var end_time = ((new Date(2017, 05, 21, 12,17,00).getTime())/1000) + 60 ;
	var countdown = end_time - ((new Date().getTime())/1000); // from: 06/22/2017 11:36 am +0530
	//var countdown = 1498111560 - ((new Date().getTime())/1000); // from: 06/22/2017 11:36 am +0530
	countdown = Math.max(1, countdown);
	$('.clock-builder-output').FlipClock(countdown, opts);
	console.log('1498111560',end_time);
});


</script>
</body>
</html>