<?php

    $servername="127.0.0.1";
    $database="axel";
    $username="root";
    $password="";

    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn)
    {
        die("Connection error: " . mysql_connect_errno());
        header('location:error.php');
    }

    if(isset($_POST["query"]))
    {
        $output = '';
        $query = "SELECT * FROM users WHERE Username LIKE '%".$_POST["query"]."%' ";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $username = $row["Username"];
                $output .= '<div class="searchlistitem" onclick= "selectuser(\''.$username.'\')">'; 
                $output .= '<img class="DP" src= "'.$row["DP"] . '" alt="defaultimgholder.png">';
                $output .= '<span class="profile"><div class = "uname">' .$username.'</div>';
                $output .= '<div class="utype">' .$row["userType"].'</div></span>';
            }
        }
        else
        {
            $output .= '<div>No results found</div>';
        }
        echo $output;
        }
    
?>