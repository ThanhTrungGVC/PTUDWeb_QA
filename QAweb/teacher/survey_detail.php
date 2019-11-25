<?php
session_start();
include_once __DIR__ . "/../database/connect.php";
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

$chart = $conn->query($sql1);

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
    <link rel="stylesheet" href="css/stylechart.css">
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
        <div class="rare-wind-gradient">
			<div class="container mx-sm-auto">
				<div class="row">
					<div class="d-flex float-left">
						<div class="d-inline-block p-2 pl-3 m-auto mr-sm-3">
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

					<div class="col-sm-9 p-0 float-right mr-0 align-self-center">
						<div class="float-right">
							<div class="dropdown">
								<?php
								if (!isset($_SESSION['us_id'])) {
									echo "<a class='nav-link deep-blue-gradient hover_color' href='login.php' style='color: #0b52d4;'> Đăng nhập </a>";
								} else {
									$id = $_SESSION['us_id'];
									$sql7 = "SELECT u.name, u.user_id, r.role_name, u.role_id FROM users u INNER JOIN roles r ON r.role_id = u.role_id WHERE u.user_id = '$id'";
									$result7 = $conn->query($sql7);
									$row7 = $result7->fetch_assoc();
									echo "
									<i class='fas fa-user'></i>
									<a class='dropdown-toggle' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
									" . $row7['name'] . "
									</a>
									";
								}
								?>
								<ul class="dropdown-menu dropdown-menu-right" style="left=-43px; min-width:205px">
									<li class="ml-3">
										<i class="far fa-user mr-1"></i> <?php echo $row7['name'] . " ( " . $row7['user_id'] . " )";  ?>
										<br>
										<i class="fas fa-graduation-cap"></i> Vai trò : <?php echo $row7['role_name']; ?>

									</li>

									<li class="dropdown-divider"></li>

									<li class="ml-3">
										<i class="fas fa-edit"></i>
										<a href="/QAweb/change_user.php?id=<?php echo $id?>">Cập nhập thông tin</a>
										<!-- <a href="SuaThongTinNguoiDung.php" data-toggle="modal" data-target="#suathongtin">Cập nhập thông tin</a> -->
									</li>

									<?php
									if ($row7['role_id'] <= 2) {
										echo "
										<li class='ml-3'>
										<i class='fas fa-history mr-1'></i> 
														<a href='/QAweb/teacher/'>Tư cách giao vien</a>
										</li>
										";
									}
									?>

									<li class="dropdown-divider"></li>

									<li class="ml-3">
										<i class="fas fa-sign-out-alt mr-1"></i>
										<a href="/QAweb/logout.php">Đăng xuất</a>
									</li>
								</ul>

							</div>

						</div>

					</div>

				</div>
			</div>
		</div>

        <div class="pt-5" style="background: azure;">
            <div class="text-center">
                <h3>
                    Vấn đề khảo sát: <?php echo $row['survey_describe']; ?>
                    <hr style="height: 1px;">
                </h3>
            </div>
        </div>

        <div class="chart">
            <div class="skillsBox">
                <h1><?php echo $row['survey_describe']?></h1>
                <?php while($chartArr = $chart->fetch_array()){?>
                <div class="skills">
                    <div class="progress">
                        <div class="percent" style="width: <?php echo $chartArr['number']?>%;"></div>
                        <div class="text-chart"><?php echo $chartArr['num_choose']?></div>
                    </div>
                    <h2><?php echo $chartArr['choose_title']?></h2>
                </div>
                <?php
                }?>
            </div>
        </div>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <button class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Thông kê khảo sát
                        </button>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body mb-5" style="height:390px; margin: 6px; border-radius: 7px;">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf-8">
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
    </script>
</body>

</html>