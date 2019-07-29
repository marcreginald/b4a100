<?php include('conf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>b4a100</title>
</head>
<body>


<br><br>
<form class="container card" action="action.php" method="POST" >

<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="uname">Name</label>
    <input type="text" class="form-control" id="uname" placeholder="Name" name="uname">
  </div>
<div class="form-group">
  <button type="submit" id="form_action" name="form_action" class="btn btn-primary">Submit</button>
</div>
<input type="hidden" name="action" id="action" value="insert"/>
<input type="hidden" name="hidden_id" id="hidden_id"/>
</form>

<!--Data-->
<br/>

<div id="user_data" class="container table-responsive">
</div>

<form action="index.php" method="get">
<div class="container form-group">
<button type="submit2" id="submit2" name="submit2" class="btn btn-primary">Pick!</button> 

<?php

include ('conf.php');

$query = "SELECT uname, email FROM user ORDER BY rand() LIMIT 1";

$statement = $con->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '

<table class="table table-striped table-bordered">

    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr> 

    <hr/>
';
if(isset($_GET['submit2']))
    {
        foreach ($result as $row) 
        {
           $output .='
                <tr>
                    <td>'.$row["uname"].'</td>
                    <td>'.$row["email"].'</td>
                </tr>
           ';
        }
    }
    else
    {
        $output .= '
            <tr>
                <td colspan="4" align="center">Data not found</td>
            </tr>
        ';
    }

    $output .='</table>';

    echo $output;

  

?> 
</div>
</form>

</body>
</html>


<script type="text/javascript" language="javascript">

$(document).ready(function(){  

load_data();

function load_data()
{
    $.ajax({
        url:"fetch.php",
        method:"POST",
        success:function(data)
        {
            $('#user_data').html(data);
        }
    })
}


});


</script>