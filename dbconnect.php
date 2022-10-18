<?php
function connect(){
    $conn=mysqli_connect("localhost","root","","chowmein") or die("Not connected");
    return $conn;
}
function getData($sql){
    $conn=connect();
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $rows[]=$row;
    }
    return $rows;
}
function setData($sql){
    $conn=connect();
    if(mysqli_query($conn,$sql)){
        return true;
    }else{
        return false;
    }
}
function getUsers($sql){
    $conn=connect();
    $result=$conn-> query($sql);
    if($result-> num_rows > 0){
        while($row= $result-> fetch_assoc()){
            echo "<tr><td>" . $row["ID"] ."</td><td>" .$row["FullName"] ."</td><td>" . $row["Username"] ."</td><td>" . $row["Email"]."</td><td>" .$row["PhoneNumber"]. "</td><td>
            <div class='btn-group'>
            <a class='btn btn-secondary' href='./edit.php?id=" .$row['ID']."'>Edit</a>
            <a class='btn btn-danger' href='./delete.php?id=" .$row['ID']."'>Delete</a>
            </td></tr>" ;
            
        }
    }else{
        echo "No results";
    }

    $conn->close();
}
function getFood($sql){
    $conn=connect();
    //$sql="SELECT*FROM menu";
    $result=$conn-> query($sql);
            if($result-> num_rows > 0){
                while($row= $result-> fetch_assoc()){
                    echo "<tr><td>" . $row["Id"] ."</td><td>" .$row["Food_Name"] ."</td><td>" . $row["Image_Path"]."</td><td>". $row["Category"] ."</td><td>". $row["Description"] ."</td><td>" . $row["Price"]."</td><td>
                    <div class='btn-group'>
                    <a class='btn btn-secondary' href='./edit1.php?id=" .$row['Id']."'>Edit</a>
                    <a class='btn btn-danger' href='./delete1.php?id=" .$row['Id']."'>Delete</a>
                    </td></tr>"  ;
                   $data=getData($sql);
                    //return $data;
                }
                    return $data;

            }else{
                echo "No results";
            }

            $conn->close();
}


?>