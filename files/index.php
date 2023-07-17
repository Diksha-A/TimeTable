<?php
if (isset($_GET['generated']) && $_GET['generated'] == "false") {
    unset($_GET['generated']);
    echo '<script>alert("Timetable not generated yet!!");</script>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
<style>
    body{    background:linear-gradient(180deg,rgb(236,213,232) 0%,
    rgb(50,112,118)100%) ;}

    /* unvisited link */


/* mouse over link */
a:hover {
  color: goldenrod;
}

/* selected link */
a:active {
  color: lightcoral;
}
</style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    
    <div class="container">  
        <div align="center">
        
            <h3><a href="https://klebcahubli.in/" target="_blank"> <img src="assets/img/Social/clglogo.png"  alt=""/> </a>TIME TABLE MANAGEMENT SYSTEM, BCA DEPARTMENT</h3>
        </div>
    </div>
</div>


<br>

<!--image-->

<div class="gallery">
  <div class="gallery-container">
    <img class="gallery-item item1" src="assets/img/lab.jpg" alt="" data-index="1">
    <img class="gallery-item item2" src="assets/img/lab2.JPG" alt="" data-index="2">
    <img class="gallery-item item3" src="assets/img/lab1.jpg" alt="" data-index="3">
    <img class="gallery-item item4" src="assets/img/stud.jpg" alt="" data-index="4">
    <img class="gallery-item item5" src="assets/img/classroom.jpg" alt="" data-index="5">
  </div>
</div>


<!--end image-->
<br>
<br>
<script type="text/javascript">
    function genpdf() {
        var doc = new jsPDF();

        doc.addHTML(document.getElementById('TT'), function () {
            doc.save('demo timetable.pdf');
        });
        window.alert("Downloaded!");
    }
</script>


<div align="center" STYLE="margin-top: 310px">
    <button data-scroll-reveal="enter from the bottom after 0.2s"
            id="teacherLoginBtn" class="btn btn-info btn-lg">TEACHER LOGIN
    </button>
    <button data-scroll-reveal="enter from the bottom after 0.2s"
            id="adminLoginBtn" class="btn btn-success btn-lg">ADMIN LOGIN
    </button>
</div>
<br>
<div align="center">
    <form data-scroll-reveal="enter from the bottom after 0.2s" action="studentvalidation.php" method="post">
        <select id="select_semester" name="select_semester" class="list-group-item">
            <option selected disabled>Select Year</option>
            <option value="1"> BCA I year </option>
            <option value="3"> BCA II Year</option>
            <option value="5"> BCA III Year </option>
        
        </select>
        <button type="submit" class="btn btn-info btn-lg" style="margin-top: 10px">Show TimeTable</button>
    </form>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Modal Header</h2>
        </div>
        <div class="modal-body" id="LoginType">
            <!--Admin Login Form-->
            <div style="display:none" id="adminForm">
                <form action="adminFormvalidation.php" method="POST">
                    <div class="form-group">
                        <label for="adminname">Username</label>
                        <input type="text" class="form-control" id="adminname" name="UN" placeholder="Username ...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="PASS"
                               placeholder="Password ...">
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-default" name="LOGIN" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
        <!--Faculty Login Form-->
        <div style="display:none" id="facultyForm">
            <form action="facultyformvalidation.php" method="POST" style="overflow: hidden">
                <div class="form-group">
                    <label for="facultyno">Faculty No.</label>
                    <input type="text" class="form-control" id="facultyno" name="FN" placeholder="Faculty No. ...">
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-default" name="LOGIN">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var teacherLoginBtn = document.getElementById("teacherLoginBtn");
    var adminLoginBtn = document.getElementById("adminLoginBtn");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("facultyForm");
    var adminForm = document.getElementById("adminForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    adminLoginBtn.onclick = function () {
        modal.style.display = "block";
        heading.innerHTML = "Admin Login";
        adminForm.style.display = "block";
        facultyForm.style.display = "none";

    }
    teacherLoginBtn.onclick = function () {
        modal.style.display = "block";
        heading.innerHTML = "Faculty Login";
        facultyForm.style.display = "block";
        adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!--HOME SECTION END-->
<!--HOME SECTION TAG LINE END-->

<!--<div id="faculty-sec">
    <div class="container set-pad">
        <div class="row text-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">OUR FACULTY </h1>

            </div>

        </div>
        <!--/.HEADER LINE END-->

        <!--<div class="row">


            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
                <div class="faculty-div">
                    <img src="assets/img/faculty/donk.jpeg" class="img-rounded"/>
                    <h3 align="center"></h3>
                    <hr/>
                    <h4 align="center">Dean<br/></h4>

                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                <div class="faculty-div">
                    <img src="assets/img/faculty/princi.jpeg" class="img-rounded"/>
                    <h3 align="center"></h3>
                    <hr/>
                    <h4 align="center">Principal<br/> </h4>

                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.6s">
                <div class="faculty-div">
                    <img src="assets/img/faculty/cat.jpeg" class="img-rounded"/>
                    <h3 align="center"></h3>
                    <hr/>
                    <h4 align="center">Chairman<br/></h4>

                </div>
            </div>

        </div>
    </div>
</div>-->

<div class="container">
    <div class="row set-row-pad">
        <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 "
             data-scroll-reveal="enter from the bottom after 0.4s">

            <h2><strong>Our Location </strong></h2>
            <hr/>
            <div>
                <h4>KLE Society’s Bachelor of Computer Application (BCA) P.C.Jabin Science College Campus, Vidyanagar Hubballi.</h4><br>
                <h4><strong>Call:</strong> +918362372298</h4>
                <h4><strong>Email: </strong><a href="mailto: infodesk@klebcahubli.in">infodesk@klebcahubli.in</a></h4>
                <h4><strong>Website: </strong><a href="https://klebcahubli.in/" target="_blank">https://klebcahubli.in/</a></h4>
                
            </div>


        </div>
        <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1"
             data-scroll-reveal="enter from the bottom after 0.4s">

            <h2><strong>Social Conectivity </strong></h2>
            <hr/>
            <div>
                <a id=a1 href="https://www.facebook.com/klesbcahubli" target="_blank"> <img src="assets/img/Social/facebook.png" alt=""/> </a>
                <a href="https://www.instagram.com/klesbcahubballi/" target="_blank"> <img src="assets/img/Social/insta.png" alt=""/></a>
                <a href="https://twitter.com/KLESBCA_HUBLI" target="_blank"> <img src="assets/img/Social/twitter.png" alt=""/></a>
            </div>
        </div>
    </div>
    <center><h6>Developed By : Neha B & Diksha A</h6></center>
</div>
<!-- CONTACT SECTION END-->
<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
--></div>
<!-- FOOTER SECTION END-->

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
<!--  Flexslider Scripts -->
<script src="assets/js/jquery.flexslider.js"></script>
<!--  Scrolling Reveal Script -->
<script src="assets/js/scrollReveal.js"></script>
<!--  Scroll Scripts -->
<script src="assets/js/jquery.easing.min.js"></script>
<!--  Custom Scripts -->
<script src="assets/js/custom.js"></script>
</div>
</body>
</html>
