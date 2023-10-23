<?php
include('connection.php');
include('generator.php');
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$query = "update plants_data set is_valid='yes' where id='$id'";
$result = mysqli_query($connection, $query);
$msg = "";
if($result){
    // Create an instance of the Certificate class
    $certificate = new Certificate();
    $certificateID = 'GC_' . time() . '.pdf';
    // Path to the certificate background image
    $certificateImage = 'certificate.jpg';
    // Generate the certificate with the background image
    $certificate->generateCertificate($name, $certificateImage);
    // Define the directory where you want to save the PDF
    $uploadDirectory = 'uploads/';
    // Generate a unique filename for the PDF (e.g., using a timestamp)
    $filename = $uploadDirectory . $certificateID;
    // Save the PDF to the uploads directory
    $certificate->Output($filename, 'F');
    $query2 = "insert into certificates set certificateID='$certificateID', phone='$phone', downloadLink='$filename'";
    $res = mysqli_query($connection, $query2);
    if($res)
        $msg = "Data Verified Successfully";
    else
        $msg = "Date Verification Failed!";
}
else
    $msg = "Issue in Updating Please Try Again!";
echo $msg;
?>