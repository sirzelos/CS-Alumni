<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../css/cssfile.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://kit.fontawesome.com/f818570924.js"></script>
  <script src="../js/javas.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Mitr|Nunito&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <title>detail</title>


</head>

<body>
  <?php
  date_default_timezone_set('Asia/Bangkok');
  require_once '../login/connection.php';

  session_start();

  if (!isset($_SESSION['user_login'])) {
    header("location: ../index.php");
  }

  $id = $_SESSION['user_login'];
  $select_stmt = $db->prepare("SELECT * FROM user WHERE id=:uid");
  $select_stmt->execute(array(":uid" => $id));

  $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

  if (isset($_SESSION['user_login'])) {
    $_SESSION['user_login_name'] = $row['username'];
    $_SESSION['status'] = $row['status'];
  }
  ?>
  <div class="container">
    <header>
      <img class="size-not-change" src="..\img\test.jpg" alt="">
      <div class="absolute-position">
        <nav class="color-nav">
          <ul>
            <li class="left"><a class="font-size hover-bottom-solid" href="..\index.php"><i class="set-padding set-margin left fas fa-desktop"></i>CS Alumni</a></li>
            <li class="right my-dropdown"><a class="no-hover" style="height:64px;" href="#"><i class="right material-icons md-48 icon-position">menu</i>
                <p class="left my-dropdown-content text-center">Menu</p>
              </a>
              <div class="my-dropdown-content color-nav">
                <?php
                if ($_SESSION['status'] == 'admin') {
                  echo "<a class = 'hover-bottom-solid' href='addofficer.php'><i class='left material-icons md-48 icon-context'>add_circle_outline</i>เพิ่มข้อมูลเจ้าหน้าที่ภาควิชา</a>";
                }
                if ($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'officer') {
                  echo "<a class = 'hover-bottom-solid' href='..\php\importCSV.php'><i class='left material-icons md-48 icon-context'>add_circle</i>เพิ่มข้อมูลนิสิตเก่าด้วย CSV</a>";
                }
                if ($_SESSION['status'] == 'officer') {
                  echo "<a class = 'hover-bottom-solid' href='add_data_alumni.php'><i class='left material-icons md-48 icon-context'>add_circle</i>เพิ่มข้อมูลนิสิตเก่า</a>
                  <a class = 'hover-bottom-solid' href='searchdatabystudentid.php'><i class='left material-icons md-48 icon-context'>create</i>แก้ไขข้อมูลนิสิตเก่า</a>
                  <a class = 'hover-bottom-solid' href='search.php'><i class='left material-icons md-48 icon-context'>youtube_searched_for</i>ค้นหาข้อมูลนิสิตเก่า</a>
                  <a class = 'hover-bottom-solid' href='searchcareerdatabystudentidforofficer.php'><i class='left material-icons md-48 icon-context'>assignment</i>เรียกดูประวัติการทำงานนิสิต</a>";
                }
                if ($_SESSION['status'] == 'alumni') {
                  echo "<a class = 'hover-bottom-solid' href='..\php\search.php'><i class='left material-icons md-48 icon-context'>perm_identity</i>ดูข้อมูลตนเอง</a>";
                }
                ?>
              </div>
            </li>
            <li class='right my-dropdown'><a class='no-hover blue' style='height:64px;' href='viewalumniprofile.php'><i class='right material-icons md-48 icon-position'>account_circle</i>
                <p class='center-align my-dropdown-content text-center'><?= $_SESSION['username'] ?></p>
              </a>

              </a>
              <div class="my-dropdown-content color-nav blue">
                <?php
                if ($_SESSION['status'] == 'alumni') {
                  echo "              <a class = 'hover-bottom-solid' href='#'><i class='left material-icons md-48 icon-context'>create</i>Edit Profile</a>";
                }
                ?>
                <a class='hover-bottom-solid' href='editaccount.php'><i class='left material-icons md-48 icon-context'>create</i>Edit Account</a>
                <a class="hover-bottom-solid" href="..\login\logout.php"><i class="left material-icons md-48 icon-context">clear</i>Logout</a>
              </div>
            </li>
            <li class="right my-dropdown"><a class="no-hover" style="height:64px;" href="#"><i class="right material-icons md-48 icon-position">ballot</i>
                <p class="left my-dropdown-content text-center">News</p>
              </a>
              <div class="my-dropdown-content color-nav">
                <?php
                if ($_SESSION['status'] == 'admin') {
                  echo "<a class = 'hover-bottom-solid' href='report.php'><i class='left material-icons md-48 icon-context'>warning</i>รายงานข่าวไม่เหมาะสม</a>
                        <a class = 'hover-bottom-solid' href='postdatecheck.php'><i class='left material-icons md-48 icon-context'>date_range</i>รายงานจำนวนโพสต์ของนิสิต</a>";
                }
                if ($_SESSION['status'] == 'alumni' or $_SESSION['status'] == 'officer') {
                  echo "<a class = 'hover-bottom-solid' href='..\php\addnewspage.php'><i class='left material-icons md-48 icon-context'>add</i>ประกาศข่าวสาร/ประชาสัมพันธ์</a>
                  <a class = 'hover-bottom-solid' href='editpost.php'><i class='left material-icons md-48 icon-context'>create</i>แก้ไขโพสของตนเอง</a>";
                }
                ?>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="content-container">
      <?php
      require_once '../login/connection.php';

      $std_id = $_POST['std_id'];
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $email = $_POST['email'];
      $gen = $_POST['gen'];
      $career = $_POST['career'];
      $query = "SELECT * FROM user WHERE std_id = '$std_id' OR email = '$email';";
      $run = $db->prepare($query);
      $run->execute();
      $search = $run->fetch(PDO::FETCH_ASSOC);
      if ($search['std_id'] == $std_id) {
        echo "<script>alert('อีเมลหรือรหัสนิสิตซ้ำกับในระบบค่ะ')</script>";
        echo "<script>window.location='add_data_alumni.php'</script>";
      } else if ($search['email'] == $email) {
        echo "<script>alert('อีเมลหรือรหัสนิสิตซ้ำกับในระบบค่ะ')</script>";
        echo "<script>window.location='add_data_alumni.php'</script>";
      } else {
        $query = "INSERT INTO user (std_id,firstname,lastname,email,status,career,gen) VALUE ('$std_id','$firstname','$lastname','$email','alumni','$career','$gen');";
        $run = $db->prepare($query);
        $run->execute();

        $timestamp = time();
        $query = "INSERT INTO career (std_id,career,timestamp) VALUE ('$std_id','$career',$timestamp);";
        $run = $db->prepare($query);
        $run->execute();
        
      echo "<br><br>";
      echo "<table>";
      echo "<tr>";
      echo "<td><font color = blue size=5px><p align=center>Student ID</font></td>";
      echo "<td><font color = black size=5px><p align=center>" .$std_id."</font></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><font color = blue size=5px><p align=center>First name</font></td>";
      echo "<td><font color = black size=5px><p align=center>" .$firstname."</font></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><font color = blue size=5px><p align=center>Last name</font></td>";
      echo "<td><font color = black size=5px><p align=center>" .$lastname."</font></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><font color = blue size=5px><p align=center>E-mail</font></td>";
      echo "<td><font color = black size=5px><p align=center>" .$email."</font></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><font color = blue size=5px><p align=center>Career</font></td>";
      echo "<td><font color = black size=5px><p align=center>" .$career."</font></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><font color = blue size=5px><p align=center>Generation</font></td>";
      echo "<td><font color = black size=5px><p align=center>" .$gen."</font></td>";
      echo "</tr>";
      echo "</table>";
        
      }

      ?>
      <form class="col s12 " action="add_data_alumni.php" method="post" enctype="multipart/form-data">
      <br><br>
        <div class="row">
          <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="action">กลับไปหน้าเพิ่มข้อมูล
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
      <footer>
        <div class="black darken-4 row container">
          <div class="col s4 center-align"><a href="https://www.facebook.com/comsci.ku/"><i class='fab fa-facebook-square  top-footer' style='font-size:60px;color:white'></i></a><br>
            <p class=" white-text text-darken-2 ">ภาควิชาวิทยาการคอมพิวเตอร์ เกษตรศาสตร์ </p>
          </div>
          <div class="col s4 center-align"><i class='far fa-envelope  top-footer' style='font-size:60px;color:white '></i><br>
            <p class=" center-align white-text text-darken-2 ">admin@cs.sci.ku.ac.th</p>
          </div>
          <div class="col s4 center-align"><i class='fas fa-phone top-footer' style='font-size:60px;color:white'></i><br>
            <p class="center-align white-text text-darken-2 ">02-562-5444, 02-562-5555 ต่อ 3721-3737</p>

          </div>
          <div class="col s12 center-align top-footer white-text text-darken-2">ที่อยู่: ภาควิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยเกษตรศาสตร์
            เลขที่ 50 ถนนพหลโยธิน แขวงลาดยาว เขตจตุจักร
            กรุงเทพมหานคร 10900</div>
        </div>
      </footer>

      <hr>
    </div>
  </div>
</body>

</html>