<?php
require 'vendor/autoload.php';
use GuzzleHttp\Psr7;
$client = new GuzzleHttp\Client();
$request = $client->get('http://www.thebluealliance.com/api/v2/event/2016cada/teams', [
    'headers' => [
        'X-TBA-App-Id' => 'frc1072:scouting:v1'
    ]
]);
$teams = json_decode($request->getBody()->getContents(), true);
?>
<!doctype html>
<html>
    <head>
        <title>1072 Scouting</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css">
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
                <a href="data.php">Data</a>
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Team Name</label>
                        <select class="form-control" name="team">
                            <?php
                            foreach ($teams as $team) { ?>
                                <option value="<?php echo $team["team_number"]; ?>">
                            <?php
                                echo $team["nickname"]." (".$team["team_number"].")"; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type of Drive Train/Wheels</label>
                        <input type="text" class="form-control" name="drive" value="">
                    </div>
                    <div class="form-group">
                        <label>Obstacles they can overcome</label>
                        <input  type="text" class="form-control" name="obstacles" value="">
                    </div>
                    <div class="form-group">
                        <label>Positions Preferred</label>
                        <input  type="text" class="form-control" name="pos" value="">
                    </div>
                    <div class="form-group">
                        <label>Drive Team Experience</label>
                        <input  type="text" class="form-control" name="xp" value="">
                    </div>
                    <div class="form-group">
                        <label>Human vs. Vision Decisions</label>
                        <input  type="text" class="form-control" name="hvvd" value="">
                    </div>
                    <div class="form-group">
                        <label>High/low left/right/center goal?</label>
                        <textarea  type="text" class="form-control" name="hlg" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Climbing?</label>
                	<input type="checkbox" class="form-control" name="climbing" value="yes"/>
		 </div>
                    <div class="form-group">
                        <label>What can be done during autonomous</label>
                        <input  type="text" class="form-control" name="auton" value="">
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                        <input type="file" name="picture">
                    </div>
                    <div class="form-group">
                        <label>Match Notes</label>
                        <textarea  type="text" class="form-control" name="match_notes" value=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
        <footer>
            Made by Ashwin Reddy
        </footer>
    </body>
</html>
