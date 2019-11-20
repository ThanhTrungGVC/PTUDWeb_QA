<?php
session_start();
include_once __DIR__ . "/../QAweb/database/connect.php";
$survey_id = $_GET['survey_id'];
$sql = "SELECT * FROM `survey` WHERE `survey_id` = $survey_id";
$result = $conn->query($sql);
$row = $result->fetch_array();

$sql2 = "SELECT MAX(`num_choose`) AS max_num FROM `survey_detail` WHERE `survey_id` = $survey_id";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_array();
$ok = $row2['max_num'];




$sql1 = "SELECT `choose_id`, `survey_id`, `choose_title`, `num_choose`, `num_choose`*100.0/SUM(`num_choose`) OVER() AS number FROM `survey_detail` WHERE `survey_id` = $survey_id";
$result1 = $conn->query($sql1);

if(isset($_POST['submit'])){
    $choose = $_POST["chooses"];
    $sql4= "UPDATE `survey_detail` SET `num_choose`=`num_choose`+1 WHERE `choose_title`=$choose";
    $result4=$conn->query($sql4);
    echo "<script>
    alert('$choose');</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Khảo sát: <?php echo $row['survey_describe']?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <link rel="stylesheet" href="/QAweb/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/QAweb/fontawesome/css/all.css">
    <link rel="stylesheet" href="/QAweb/MDB/css/mdb.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Javascript -->
    <script src="/QAweb/js/jquery-3.4.1.js"></script>
    <script src="/QAweb/js/popper.min.js"></script>
    <!-- <script src="bootstrap/js/bootstrap.js"></script> -->
    <script src="/QAweb/bootstrap/js/bootstrap.min.js"></script>
    <script src="/QAweb/MDB/js/mdb.js"></script>
    <script type="text/javascript" src="/QAweb/fontawesome/js/all.js"></script>
    <script type="text/javascript" src="/QAweb/jcarousel/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="/QAweb/jcarousel/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="/QAweb/canvasjs/canvasjs.min.js"></script>
</head>

<body>
    <div class="container mb-5">
        <nav class="navbar navbar-expand-sm" style="background-color:#00ffff">
            <div class="d-flex float-left">
                <div class="d-inline-block p-2 m-auto mr-sm-3">
                    <a href="index.php"><img src="/QAweb/img/logouet.png" width="60px"></a>
                </div>
                <div class="d-inline-block text-center m-auto">
                    <div>
                        <a href="index.php" class="text-dark">
                            <h2 class="d-block mb-0">
                                QA-UET
                            </h2>
                            <h6 class="d-block mb-0">
                                <small>
                                Nơi trao đổi của mọi người

                                </small>
                            </h6>
                        </a>
                    </div>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color:#333333;color:white;height:50px">
                MENU
            </button>

            <?php
            $id_tc = $_SESSION['us_id'];
            $sql_us = "SELECT * FROM users u
					INNER JOIN roles r ON u.role_id = r.role_id
					WHERE user_id = '$id_tc'";
            $result_us = $conn->query($sql_us);
            $row_us = $result_us->fetch_assoc();
            ?>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav d-flex ml-auto">
                    <li class="nav-item m-1">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#quanly" style="color:black;font-weight:bold;font-size: 20px">
                            <img src="/QAweb/img/user.png" width="30px">
                            <?php
                            echo $row_us['name'];
                            ?>
                        </a>
                        <div class="text-primary">
                            <div class="pl-2">
                                <i class="fas fa-long-arrow-alt-left mb-1"></i>
                                <a href="/QAweb/teacher/">Quay tro lai</a>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="pt-5" style="background: azure;">
            <div class="text-center">
                <h3>
                    Vấn đề khảo sát: <?php echo $row['survey_describe']; ?>
                    <hr style="height: 1px;">
                </h3>
            </div>
        </div>

        <div class="my-4" style="display: grid;">
            <div style="display: contents;">
                <form action="" method="POST">
                    <?php
                    $i=1;
                    $sql3 = "SELECT `choose_id`, `survey_id`, `choose_title`, `num_choose` FROM `survey_detail` WHERE `survey_id` = $survey_id";
                    $result3 =$conn->query($sql3);
                    while ($row3 = $result3->fetch_assoc()) {
                        ?>
                        <div class="form-check d-flex">
                            <input class="form-check-input" type="radio" name="chooses" id="chooses<?php echo $i?>" value="<?php echo $row3['choose_title'];?>" checked>
                            <div>
                            <label class="form-check-label" for="chooses<?php echo $i?>">
                                <?php echo $row3['choose_title'];?>
                            </label>
                            <div class="d-inline"><?php echo $row3['num_choose']?></div>
                            <!-- <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa lựa chọn');">Xóa</a> -->
                        </div>
                        
                    </div>
                    <?php
                    $i++;
                        
                    }
                    ?>
                    <button class="btn btn-primary" type="submit" name="submit">ok</button>
                </form>

            </div>x
        </div>
        <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <button class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Thông kê khảo sát
                        </button>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body mb-5" style="border: 1px solid; overflow: auto;height:390px; margin: 6px; border-radius: 7px;">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- <script type="text/javascript" charset="utf-8">
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Kết quả thông kê khảo sát"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: explodePie
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} - {y}%",
                    dataPoints: [
                        <?php
                        while ($row1 = $result1->fetch_array()) {
                            if ($row1['num_choose'] == $ok) {
                                echo "{name: '" . $row1['choose_title'] . "', y:" . $row1['number'] . ", exploded: true" . "},\n";
                            } else {
                                echo "{name: '" . $row1['choose_title'] . "', y:" . $row1['number'] . "},\n";
                            }
                        }
                        ?>
                    ]
                }]
            });
            chart.render();
        }

        function explodePie(e) {
            if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
            } else {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
            }
            e.chart.render();

        }
    </script> -->
</body>

</html>