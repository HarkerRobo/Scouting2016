<?php
$fgc = file_get_contents('data.txt');
$telemetry = explode('||', $fgc);
$telemetry = array_slice($telemetry, 0, count($telemetry)-1);
// TODO:
// Read all the entries
// Combine entries
// Rename as telemetry
$data = array();
foreach($telemetry as $t) {
    if (key_exists(explode(",", $t)[0], $data)) {
        $old = $data[explode(",", $t)[0]];
        $new = array_slice(explode(",", $t), 1);
        if($old != $new) {
            for($i = 0; $i < count($old); $i++) {
                if(ctype_space($old[$i]) || ctype_space($new[$i])) {
                    $data[explode(",", $t)[0]] = $old[$i].$new[$i];
                } else {
                    $old[explode(",", $t)[0]] = $old[$i].";".$new[$i];
                }
            }
        }
    } else {
        $data[explode(",", $t)[0]] = array_slice(explode(",", $t) , 1);
    }
}
// recombine into telemetry
$count = 0;
foreach($data as $key => $value) {
    $telemetry[$count] = $key.",".implode(",",$value);
    $count++;
}
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
                            <td>Match Notes</td>
                            <td>Picture</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($telemetry as $t) { ?>
                            <tr>
                                <?php
                                $t = explode(",",$t);
                                for($i = 0; $i < count($t); $i++) {
                                    if($i != 9 && $i != count($t) && $i != 2) { ?>
                                        <td><?php echo $t[$i];?></td>
                                    <?php
                                } else if ($i == count($t)) {
                                    ?><td><img src="<?php echo $t[$i]; ?>"></td><?php
                                }
                                }
                                ?>
                            </tr>
                        <?php }
                         ?>
                    </tbody>
	    </table>
	</div>
</div>
</body>
