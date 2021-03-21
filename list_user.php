
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
<h1 class="heading mt-4">
        ALL User name
    </h1>

    <h4 class="heading">
            <a href="adddata.php">Add data</a>
        </h4>

<?php
 $connect = mysqli_connect("localhost","root","","hackathon");

$query = mysqli_query($connect,"SELECT distinct(name) FROM data ");


require_once ('phpqrcode/qrlib.php');
$path = 'images/';
$file = $path.uniqid().".png";

?>

    <div class="adp-box">
    <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Edit</th>
              <th scope="col">Send QR Code</th>
            </tr>
          </thead>
          <tbody>
    <?php 
    while($row = mysqli_fetch_assoc($query)){
        $name = $row['name'];
        $name1  = bin2hex($name);
        $text = "Hello $name <br>";
        $text .= "<a href='updatedata.php?n=".$name1."'>Please click here to edit Your file</a>";
        ?>
     
            <tr class="my-3">
              <th scope="row"><?php echo $row['name'];?></th>
              <td><a class="btn" href="updatedatauser.php?n=<?php echo bin2hex($row['name']); ?>" id="editclick"><button class="btn" >Edit</button></a> 
              <!-- <input type="text" value="<?php echo $row['name']; ?>" id="user_name"> -->
              </td>
              <form action="shoeqrcode.php?n=<?php echo $name1;?>" method="post">
              <td><a class="btn" type="submit" id="editclick"><button class="btn" >Send</button></a> </td>
              </form>
            </tr>
           
         

        <?php
    }
    ?> </tbody>
    </table>

    </div>

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script>

    $(document).on('click','#editclick',function()){
    var favoritemovie = document.getElementById('user_name').value;
    alert(favoritemovie);
sessionStorage.setItem("favoriteMovie", favoritemovie);
    }
    </script> -->
</body>

</html>