<?php
require(__DIR__.'/vendor/autoload.php');
if (!isset($_SERVER['REDIS_HOST']))
{
  die('Redis host is undefined');
}
$counterKey = 'counter';
$redis = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => $_SERVER['REDIS_HOST'],
    'port'   => 6379,
]);
$redis->incr($counterKey);
$value = $redis->get($counterKey);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Counter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('./images/background.png');
                background-position: center;
                background-repeat: no-repeat;
                background-color: #000;
                color: #eee;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .content {
                text-align: center;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <?php echo "You visited {$value} times"; ?>
                </div>
            </div>
        </div>
    </body>
</html>