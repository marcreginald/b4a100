<?php

    include('conf.php');

    $query = "SELECT * FROM user";

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


    if($total_row > 0)
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