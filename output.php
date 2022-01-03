<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>點名</title>
	 <link rel="icon" type="image/x-icon" href="teafile/assets/favicon.ico" />
       
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="teafile/css/styles.css" rel="stylesheet" />
<style>
.abc{
width:100px;
margin: 0px auto;
}
.cba{
width:700px;
margin: 0px auto;
}	
</style>
</head>
<body>
<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="teacher.php">宜大老師查詢網</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="login.php">登出</a></li>
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="aboutus.php">聯絡我們</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		<br><br><br><br><br>
<p style='color:black;font-size:15pt;text-align:center;letter-spacing:2;line-height:2;'>微積分一 點名<br><br>

<div class ="cba">
<p style='color:black;font-size:10pt;text-align:center;letter-spacing:2;line-height:2;'>


<table style="border:3px #cccccc solid;" cellpadding="10" border='4' table width="800" >
<tr>
	<td>學號</td>
	<td>班級</td>//aaa
	<td>姓名</td>
	<td>周次</td>
	<td>節次</td>
	<td>狀態</td>
</tr>

<?php
include('conn.php'); 
mysqli_query($con, "SET NAMES 'UTF-8'");

$session=$_GET['session'];

$sql="select stu_info.stu_id, class, name, CASE when weeks is NULL then '' else weeks end as weeks, CASE WHEN session is NUll then '' else session end as session, case WHEN situation is NULL then '' else situation end as situation from (select select_course.stu_id, student.class, student.name from select_course right join student on select_course.stu_id = student.stu_id where select_course.course_id = 'C12') stu_info left join (select * from situation where weeks = '1' and session = '".$session."' ) class_info on stu_info.stu_id = class_info.stu_id";


$result = mysqli_query($con, $sql);

//echo $sql;

while($row=mysqli_fetch_row($result)){	
	echo"<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "<td>".$row[5]."</td>";
	echo "</tr>";
}
	
mysqli_close($con);

?>
</table>
</div>
