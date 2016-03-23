<?php
$fgc = file_get_contents('data.txt');
$telemetry = explode('||', $fgc);
$telemetry = array_slice($telemetry, 0, count($telemetry)-1);
?>
<!doctype html>
<html>
    <head>
        <title>1072 Scouting</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css">
    </head>
<body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">1072 Scouting</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="col-md-9">
                <a href="index.php">main page</a>
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <td>Team</td>
                            <td>Wheels</td>
                            <td>Obstacles</td>
                            <td>Positions</td>
                            <td>Drive Team XP</td>
                            <td>Human v. Vision Decisions</td>
                            <td>High/low and left/right/center goal?</td>
                            <td>Climbing</td>
                            <td>Autonomous</td>
                            <td>Picture</td>
                        </tr>
                    </thead>
                    <tbody>
			<?php
                        foreach($telemetry as $dataset) {
                            ?>
			<tr>
			<?php $data = explode(",", $dataset);
			for($i = 0; $i < count($data) - 1; $i++) {
				?>
			<td><?php
			if($i < 9) { 
				echo $data[$i]; 
			} else {
?>			<img width="100px;" src="<?php echo $data[$i+1]; ?>"/> <?php
			}
			?></td><?php } ?>
			</tr>
			<?php } ?>
                  </tbody>
	</table>
	</div>
</div>
</body>		
