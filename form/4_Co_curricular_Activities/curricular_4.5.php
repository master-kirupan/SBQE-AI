<?php 
include "../backend/function_loggedin.php";
    include "../backend/config.php";


if(isset($_SESSION['curricular_4_1']) && !empty($_SESSION['curricular_4_1'])) {
  
}else{ header("location: curricular_4.1.php");}

if(isset($_SESSION['curricular_4_2']) && !empty($_SESSION['curricular_4_2'])) {
  
}else{ header("location: curricular_4.2.php");}

if(isset($_SESSION['curricular_4_3']) && !empty($_SESSION['curricular_4_3'])) {
  
}else{ header("location: curricular_4.3.php");}

if(isset($_SESSION['curricular_4_4']) && !empty($_SESSION['curricular_4_4'])) {
  
}else{ header("location: curricular_4.4.php");}


    if(isset($_POST['submit'])){
        $data1 = mysqli_real_escape_string($con,$_POST['marks1']);
        $data2 = mysqli_real_escape_string($con,$_POST['marks2']);

        if ($data1 != "" && $data2 != "" ){
            $sql_insert_datarow_1 = "INSERT INTO    co_curricular_activities_main (School_ID,Activity_Number,Marks,Session_Name) VALUE ('{$_SESSION['school_id']}','4.5.1',$data1,'{$_SESSION['username']}')";

            $sql_insert_datarow_2 = "INSERT INTO    co_curricular_activities_main (School_ID,Activity_Number,Marks,Session_Name) VALUE ('{$_SESSION['school_id']}','4.5.2',$data2,'{$_SESSION['username']}')";

            $result_1 = mysqli_query($con,$sql_insert_datarow_1);
            $result_2 = mysqli_query($con,$sql_insert_datarow_2);

            if($result_1 && $result_2){}else{
            echo("Error description: " . mysqli_error($con));}

        

    }

}

$marks1 = "";
$marks2 = "";

$sql = "SELECT  Marks FROM  co_curricular_activities_main WHERE Activity_Number ='4.5.1' && School_ID ='{$_SESSION['school_id']}' order by Co_curricular_Activities_ID  desc LIMIT 1 ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        
         $marks1 = $row["Marks"];  } // The value we usually set is the primary 

}

$sql = "SELECT  Marks FROM  co_curricular_activities_main WHERE Activity_Number ='4.5.2' && School_ID ='{$_SESSION['school_id']}' order by Co_curricular_Activities_ID  desc LIMIT 1 ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        
         $marks2 = $row["Marks"];  } // The value we usually set is the primary 

}



$t=time();
$t . "<br>";
//echo(date("Y-m-d",$t));

$date = date("Y-m-d",$t);
//echo "<br>". $date;

if(isset($_POST['evaluator_submit'])){

    $evaluator_name = mysqli_real_escape_string($con,$_POST['evaluator_name']);
    $date = mysqli_real_escape_string($con,$_POST['date']);


if ( $evaluator_name != "" && $date != ""  ){


        $sql_evaluator = "INSERT INTO evaluator (
            email,
            School_ID,
            Name,
            UserInputName,
            Section,
            Time_submit) 
        VALUE 
        ('{$_SESSION['email']}',
            '{$_SESSION['school_id']}',
            '{$_SESSION['username']}',
            '$evaluator_name',
            'Primary Section 111',
            '$date')";

        $result_evaluator = mysqli_query($con,$sql_evaluator);

if($result_evaluator){
            
            
        }else{
            echo("Error description: " . mysqli_error($con));
        }

        

    }

}


$evaluator_name_value = "";
$evaluator_date = "";

$sql = "SELECT UserInputName, Time_submit  FROM evaluator WHERE email ='{$_SESSION['email']}' && School_ID ='{$_SESSION['school_id']}' 
 LIMIT 1 ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        
         $evaluator_name_value = $row["UserInputName"];   // The value we usually set is the primary key
         $evaluator_date = $row["Time_submit"]; }// The value we usually set is the primary key
       //  echo("Hello world ".$evaluator_name_value. " " . $evaluator_date);
         
       } else { echo "error"; } // While loop must be terminated 






?>


<!doctype html>
<html lang="en">
<head>

      <style >

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}



.styled-table thead tr {
    background-color: #968c8c;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid    #968c8c;
}

.form-submit-button {
background: #968c8c;
color: white;
border-style: outset;
border-color: #968c8c;
height: 50px;
width: 200px;
font: bold15px arial,sans-serif;
text-shadow: none;
}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=file] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}

input[type=number]:focus {
  border: 3px solid #555;
}

input[type=file]:focus {
  border: 3px solid #555;
}

input[type=date]:focus {
  border: 3px solid #555;
}



</style>

    <meta charset="utf-8" />
    <link rel="icon" type="../.././image/png" href="../.././assets/paper_img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>SBQE & AI - Form</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="../.././bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../.././assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../.././assets/css/demo.css" rel="stylesheet" />
    

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
    <?php include ".././backend/navbar.php";?>

<div class="wrapper">

    <div class="main">
        <div class="section">
         <div class="container tim-container">
            <div class="tim-title">
                <h3><b>School Based Quality Education & Assessment Indicators</b></h3>
            </div>


<form action="" method="POST">
<table class="styled-table">
  <h3> 4. Formal Curriculum Management</h3>
  <p>Awarding marks: Award marks for each indicator according to the following rating scales using the descriptions
given in the indicators.</p>

<p>01 mark – Immediate development required </p>
<p>02 marks – Development required</p>
<p>03 marks - Satisfactory</p>
<p>04 marks – Good </p>
<p>05 marks – Very good</p>
<p>06 marks - Excellent </p>
  <thead>
  <tr>
    <th ></th>
    <th>Indicator</th>
    <th> Marks</th>
  </tr>
</thead>

  <tr class="active-row" >
    <td>4.5.1</td>
    <td> Implementation of programmes to develop students’ code of 
ethics, religious , values, culture and wellbeing</td>
    <td><input type="number"  autocomplete="off" name="marks1" value="<?php echo $marks1; ?>" required ></td>
    
  </tr>

    <tr class="active-row" >
    <td>4.5.2</td>
    <td>Implementation of different programmes to promote national 
integrity and implementation of programmes to develop leadership 
and positive attitudes</td>
    <td><input type="number"  autocomplete="off" name="marks2" value="<?php echo $marks2; ?>" required ></td>
    
  </tr>




  </tr>

    <tr class="active-row" >
    <td></td>
    <td>Total Marks for the criterion</td>
    <td><input type="number"  autocomplete="off" name="" value="<?php echo $total_marks = $marks1 + $marks2; ?>" disabled ></td>
    <?php $_SESSION["curricular_4_5"] = $total_marks; ?>
    <?php echo "Marks Total"."  ". $_SESSION["curricular_4_5"]; ?>
  </tr>


  
</table>
<center> <input class="form-submit-button "  type="submit"  id="submit_primary_section" name="submit" placeholder='Sumbit' onclick="register(event)">
</center>
</form>



<form action="" method="POST">
<table class="styled-table">
  <p></p>
  <thead>
  <tr>
    <th ></th>
    <th>Number of indicators 
evaluated</th>
    <th> Maximum marks that can be obtained 
according to the evaluated indicators</th>
    <th> Total marks 
obtained</th>
    <th> Percentage</th>
  </tr>
</thead>

  <tr class="active-row" >
    <td>1.1.1.1</td> <?php $indicators = 14; ?>
    <td><input type="text" name="data1" autocomplete="off" value = " <?php echo $indicators; ?>" disabled /></td>
    <td><input type="text" name="data1" autocomplete="off" value = " <?php echo $indicators * 6; ?>" disabled/></td>
    <td><input type="text" name="data1" autocomplete="off" value="<?php echo $tmarks = $_SESSION['curricular_4_1'] + $_SESSION['curricular_4_2'] + $_SESSION['curricular_4_3'] + $_SESSION['curricular_4_4'] + $_SESSION['curricular_4_5']; ?>"  disabled /></td>
    <td><input type="text" name="data1" autocomplete="off" value = "<?php echo ( $tmarks /( $indicators * 6))*100;?>" disabled /></td>
  </tr>



  
</table>
<center> <input class="form-submit-button "  type="submit"  id="submit_primary_section" name="submit_primary_section" placeholder='Sumbit' onclick="register(event)">
</center>
</form>



<form action="" method="POST">
<table class="styled-table">
  <P> User conformination</P>
  
  <tr>
        <td></td>
  </tr>
  
  <tr>
    <td></td>
    <td>Name of the evaluator</td>
    <td><input type="text"  autocomplete="off" name="evaluator_name" value="<?php echo $evaluator_name_value; ?>" required ></td>
    <td></td>
  </tr>

  <tr class="active-row" >
    <td></td>
    <td>Date</td>
    <td><input type="date" name="date" value="<?php echo $evaluator_date; ?>" required /></td>
    <td></td>
    
  </tr>
  <tr class="active-row" >
    <td> </td>
    
    <td><center><input class="form-submit-button " type="submit" value="Final - Submit" name="evaluator_submit"/></td></center>

  </tr>
</table>

</form>


<form action="fileupload.php" method="post" enctype="multipart/form-data">
  <table>
    <tr>
  <td>Select E-Signature to upload:</td>
  
  </tr>
  <tr>
    <td><input type="file" name="fileToUpload" id="fileToUpload"> </td>
    <td><input class="form-submit-button "type="submit" value="Upload Image" name="submit"></td>
  </tr>
  </table>
</form>

<a  style="float:right; color: black"; href="" >Go to next page</a>
<a  style="float:left; color: black;" href="curricular_4.4.php" >Go to previous page</a>
                
            <br> <br>

            </div>
    </div>
</div>




<?php include ".././backend/footer.php";?>
</div>


</body>

    <script src="../.././assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../.././assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

    <script src="../.././bootstrap3/js/bootstrap.js" type="text/javascript"></script>

    <!--  Plugins -->
    <script src="../.././assets/js/ct-paper-checkbox.js"></script>
    <script src="../.././assets/js/ct-paper-radio.js"></script>
    <script src="../.././assets/js/bootstrap-select.js"></script>
    <script src="../.././/js/bootstrap-datepicker.js"></script>

    <script src="../.././assets/js/ct-paper.js"></script>
</html>
