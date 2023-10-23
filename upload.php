<?php
include( 'connection.php' );
$name = $_POST['name'];
$phone = $_POST['phone'];
$isValid = 'no';
$image = $_FILES['image']['name'];
$target = 'images/'.basename( $image );
if (move_uploaded_file( $_FILES['image']['tmp_name'], $target )) {
    $insert_query = mysqli_query( $connection, "insert into plants_data set name='$name', phone='$phone', img_link='$target', is_valid='$isValid'" );
    if ( $insert_query>0 )
    {
        $msg = 'Data Submitted Successfuly!';
    } else {
        $msg = 'Error! please try again.';
    }
} else {
    $msg = 'Failed to upload image';
}
echo $msg;
?>
