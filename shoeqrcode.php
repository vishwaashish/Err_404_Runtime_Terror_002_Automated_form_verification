<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <!-- bootstrap -->

    <style>
        body {
            background: #1cbe45;
        }

        .adp-box {
            width: 45%;
            margin: 3rem auto;
            background: #fff;
            padding: 20px;
        }

        .heading {
            color: #fff;
            text-align: center;
            text-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
        }

        .input-group {
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .removeSlide {
            position: absolute;
            top: 45%;
            cursor: pointer;
        }

        @media(max-width:746px) {
            .adp-box {
                width: 80%;
            }

            .removeSlide {
                position: unset;
                float: right;
            }
        }
    </style>
</head>
<body>
<h4 class="heading h4" style="margin-top:50px;font-size:30px">
            <a href="adddata.php">Add data</a>
        <a href="list_user.php"> Show User data</a>
        </h4>
 <?php

$name = $_GET["n"];
    // require_once 'qrlib.php';
$name1 =  $name;
    
echo "<div style='text-align:center;'>";
$data = "http://localhost/hackathon/hack/updatedata.php?n=$name1"; 
echo "<h2 class=\"heading mt-4\">Download and Send The link.</h2>"; 
echo "<img src='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=$data' height=250 width=250/>"; 
echo "<br> <br><br>";


echo "<br><input type=\"text\" value='$data'><br><br>";
echo "<a  download='test.png' href='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=$data' title='ImageName'>
    <button class=\"btn btn-info\">Download</button>
</a>";


echo "<a  href=\"mailto:vishwakarmaashish165@gmail.com?subject=Edit You Data!&body= Copy the Link in Browser :- $data' \"><button class=\"btn btn-info\">Send Mail</button></a>";
echo "<br></div>";
?>

</body>





