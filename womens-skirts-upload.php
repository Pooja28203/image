<?php

error_reporting(E_ALL);

include "includes/config.php";
 
if (isset($_POST['submit']))
{

    header("content-type: image/jpg");
 
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            fgetcsv($csvFile);
 
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                $sku = $getData[0];
                $waist_in = $getData[1];
                $waist_cm = $getData[2];
                $hip_in = $getData[3];
                $hip_cm = $getData[4];
                $body_length_in = $getData[5];
                $body_length_cm = $getData[6];
                $sweep_in = $getData[7];
                $sweep_cm = $getData[8];

                $query = "SELECT id FROM womens_skirts WHERE sku = '" . $getData[0] . "'";
 
                $check = mysqli_query($connection, $query);
 
                if ($check->num_rows > 0)
                {
                    $result = mysqli_query($connection, "UPDATE womens_skirts SET waist_in = '" . $waist_in . "', waist_cm = '" . $waist_cm . "', hip_in = '" . $hip_in . "', hip_cm = '" . $hip_cm . "', body_length_in = '" . $body_length_in . "', body_length_cm = '" . $body_length_cm . "', sweep_in = '" . $sweep_in . "', sweep_cm = '" . $sweep_cm . "'");
                }
                else
                {
                    $result = mysqli_query($connection, "INSERT INTO womens_skirts (sku, waist_in, waist_cm, hip_in, hip_cm, body_length_in, body_length_cm, sweep_in, sweep_cm) VALUES ('" . $sku . "','" . $waist_in . "','" . $waist_cm . "','" . $hip_in . "','" . $hip_cm . "','" . $body_length_in . "','" . $body_length_cm . "','" . $sweep_in . "','" . $sweep_cm . "')");
                }

                if($result)
                {
                    echo "Success";
                }
                else
                {
                    echo "Error";
                }

                $file_name='templates/womens/skirts/jpg/template.jpg';

                $font = 'assets/fonts/Montserrat-Bold.ttf';
                $font2 = 'assets/fonts/Montserrat-Light.ttf';

                $img_source=imagecreatefromjpeg($file_name);
                $text_color=imagecolorallocate($img_source,9,38,36);

                $x=373;
                $y=485;
                imagettftext($img_source,18,0,$x,$y,$text_color,$font,$sku);

                $x=460;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_in);

                $x=717;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);

                $x=460;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$hip_in);

                $x=717;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$hip_cm);

                $x=460;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$body_length_in);

                $x=717;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$body_length_cm);

                $x=460;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_in);

                $x=717;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_cm);

                imagejpeg($img_source,"outputs/womens/skirts/jpg/".$sku."_M.jpg",100);
                imagedestroy($img_source);

                header("Location: womens-skirts-import.php");

            }

            fclose($csvFile);
         
    }
    else
    {
        echo "Please select valid file";
    }
}