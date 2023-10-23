<?php
require('fpdf/fpdf.php');

class Certificate extends FPDF {
    function generateCertificate($name,$certificateImage) {
        list($imageWidth, $imageHeight) = getimagesize($certificateImage);
        $this->AddPage('L',[$imageWidth,$imageHeight]);
        
        // Load the certificate background image
        $this->Image($certificateImage, 0, 0, $imageWidth, $imageHeight);
      
        // Set font and other text properties
        $this->SetFont('Arial', 'B', 90);
        
        // Add text at specific positions
        $this->Text(420, 360, $name);  // X, Y, Text
    }
}
?>
