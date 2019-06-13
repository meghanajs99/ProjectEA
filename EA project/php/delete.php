<?php 
error_reporting(0);
$conn=mysqli_connect('localhost','root','','projectea');
if(!$conn)
{
echo("The connectiom is not Established");
}
if(count($_POST['checkbox'])==0)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('please select at least 1 box');
 window.location.href='http://localhost/EA%20project/index.php';
    </script>");
}
else
{
    foreach($_POST['checkbox'] as $selected)
                    {
$query="DELETE FROM userbillinfo WHERE billno='".$selected."'";
$result=mysqli_query($conn,$query);
$res1=mysqli_query($conn,"SELECT * FROM userbillinfo where billno='".$selected."'");


if(mysqli_num_rows($res1)==1)
{

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('NOT DELETED');
 window.location.href='http://localhost/EA%20project/index.php';
    </script>");
}
else
{

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('DELETED SUCCESSFULLY');
 window.location.href='http://localhost/EA%20project/index.php';
    </script>");
}
    }
}
$conn->close();
?>
