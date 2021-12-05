<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
   
    $query = "SELECT * FROM `seeds` WHERE CONCAT(`seedtype`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `seeds`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "ense374");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> SEED SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="search.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>id</th>
                    <th>seedtype</th>
                    <th>conditions</th>
                    <th>intro</th>
                    <th>suggestion</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['seedtype'];?></td>
                    <td><?php echo $row['conditions'];?></td>
                    <td><?php echo $row['intro'];?></td>
                    <td><?php echo $row['suggestion'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        <a href="http://localhost/shopping/">Home</a>
    </body>
</html>
