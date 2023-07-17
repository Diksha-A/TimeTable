<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <script type="text/javascript" src="assets/jsPDF/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>

</head>
<body>
<style>
    table {
        margin-top: 20px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 90%;
    }

    td, th {
        border: 2px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #ffffff;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }
    #back{
        margin-top: 20px;
        margin-left: 95%;
        background-color: #1A94C4;
        border: #fff;
        border-radius: 5px;
        width: 60px;
    }
    #back_a{
        color: #fff;
    }
</style>
<button id=back><a id=back_a href="index.php">Back</a></button>
<div id="TT" style="background-color: #FFFFFF">
    <table border="2" cellspacing="3" align="center" id="timetable">
        <caption>
            <strong>
                <?php
                if (isset($_POST['select_semester'])) {
                    echo "BCA DEPARTMENT Semester " . $_POST['select_semester'] . " ";
                    $year = $_POST['select_semester'] ;
                    $r = mysqli_fetch_assoc(mysqli_query(mysqli_connect("localhost", "root", "", "ttms2"), "SELECT * from classrooms
                                WHERE status = '$year'"));
                    echo " ( " . $r['name'], " ) ";
                }
                ?>
            </strong>
        </caption>
        <tr>
                <td style="text-align:center">WEEKDAYS</td>
                <td style="text-align:center">9:00-10:00</td>
                <td style="text-align:center">10:00-10:15</td>
                <td style="text-align:center">10:15-11:15</td>
                <td style="text-align:center">11:15-12:15</td>
                <td style="text-align:center">12:15-1:15</td>
                <td style="text-align:center">1:15-2:00</td>
                <td style="text-align:center">2:00-2:30</td>
                <td style="text-align:center">2:30-4:30</td>
            </tr>
        <tr>
            <?php
            $table = null;
            if (isset($_POST['select_semester'])) {
                $table = " semester" . $_POST['select_semester'] . " ";
            } else
                echo '</table>';
            if (isset($_POST['select_semester']) && $_POST['select_semester'] % 2 !== 0) {
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms2"),
                    "SELECT * FROM" . $table);
                $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms2"),
                    "SELECT * FROM subjects");
                $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY');
                $i = -1;
                $str = "";
                if (isset($_POST['select_semester'])) {
                    while ($r = mysqli_fetch_assoc($qq)) {
                        if ($r['isAlloted'] == 1 && $r['semester'] == $_POST['select_semester']) {
                            $str .= $r['subject_code'] . " : " . $r['subject_name'] . " ";
                            if (isset($r['allotedto'])) {
                                $id = $r['allotedto'];
                                $qqq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms2"),
                                    "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                $rr = mysqli_fetch_assoc($qqq);
                                $str .= "---->" . $rr['alias'] . " : " . $rr['name'] . " ";
                            }
                            if ($r['course_type'] !== "LAB") {
                                $str .= "<br>";
                                continue;
                            } else {
                                $str .= "<br>";
                            }
                        }
                    }
                }
                while ($row = mysqli_fetch_assoc($q)) {
                    $i++;
                    echo "
                <tr><td style=\"text-align:center\">$days[$i]</td>
                 <td style=\"text-align:center\">{$row['period1']}</td>
                 <td style=\"text-align:center\">PRAYER</td>

                <td style=\"text-align:center\">{$row['period2']}</td>
                <td style=\"text-align:center\">{$row['period3']}</td>
                 <td style=\"text-align:center\">{$row['period4']}</td>
                  <td style=\"text-align:center\">{$row['period5']}</td>
                  <td style=\"text-align:center\">LUNCH</td>
                  <td style=\"text-align:center\">{$row['period6']}</td>
                </tr>\n";
                }

                echo '</table>';
                    $sign = "GENERATED VIA TIMETABLE ,BCA DEPARTMENT, HUBLI.";
                    
                if (isset($_POST['select_semester'])) {
                    echo "<div align=\"center\">" . "<br>" . $str . "<br>
                            <strong>" . $sign . "<br></strong></div>";
                }
                unset($_GET['generated']);
            } else {
                header("location:index.php?generated=false");

            }
            ?>
            <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
</div>
<script type="text/javascript">
       function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("TT").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
</script>
<div align="center" style="margin-top: 10px">
    <button id="saveaspdf" class="btn btn-info btn-lg" onclick="printDiv()">PRINT</button>
</div>
<br>
</body>
</html>