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
                $bust_in = $getData[1];
                $bust_cm = $getData[2];
                $shoulder_width_in = $getData[3];
                $shoulder_width_cm = $getData[4];
                $sleeve_length_in = $getData[5];
                $sleeve_length_cm = $getData[6];
                $length_in = $getData[7];
                $length_cm = $getData[8];
                $sweep_in = $getData[9];
                $sweep_cm = $getData[10];

                $query = "SELECT id FROM womens_jackets WHERE sku = '" . $getData[0] . "'";
 
                $check = mysqli_query($connection, $query);
 
                if ($check->num_rows > 0)
                {
                    $result = mysqli_query($connection, "UPDATE womens_jackets SET bust_in = '" . $bust_in . "', bust_cm = '" . $bust_cm . "', shoulder_width_in = '" . $shoulder_width_in . "', shoulder_width_cm = '" . $shoulder_width_cm . "', sleeve_length_in = '" . $sleeve_length_in . "', sleeve_length_cm = '" . $sleeve_length_cm . "', length_in = '" . $length_in . "', length_cm = '" . $length_cm . "', sweep_in = '" . $sweep_in . "', sweep_cm = '" . $sweep_cm . "'");
                }
                else
                {
                    $result = mysqli_query($connection, "INSERT INTO womens_jackets (sku, bust_in, bust_cm, shoulder_width_in, shoulder_width_cm, sleeve_length_in, sleeve_length_cm, length_in, length_cm, sweep_in, sweep_cm) VALUES ('" . $sku . "','" . $bust_in . "','" . $bust_cm . "','" . $shoulder_width_in . "','" . $shoulder_width_cm . "','" . $sleeve_length_in . "','" . $sleeve_length_cm . "','" . $length_in . "','" . $length_cm . "','" . $sweep_in . "','" . $sweep_cm . "')");
                }

                if($result)
                {
                    echo "Success";
                }
                else
                {
                    echo "Error";
                }

                $file_name='templates/womens/jackets/jpg/template.jpg';

                $font = 'assets/fonts/Montserrat-Bold.ttf';
                $font2 = 'assets/fonts/Montserrat-Light.ttf';

                $img_source=imagecreatefromjpeg($file_name);
                $text_color=imagecolorallocate($img_source,9,38,36);

                $x=413;
                $y=485;
                imagettftext($img_source,18,0,$x,$y,$text_color,$font,$sku);
                $x=486;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$bust_in);
                $x=722;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$bust_cm);
                $x=486;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$shoulder_width_in);
                $x=722;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$shoulder_width_cm);
                $x=486;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sleeve_length_in);
                $x=722;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sleeve_length_cm);
                $x=486;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$length_in);
                $x=722;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$length_cm);
                $x=486;
                $y=1061;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_in);
                $x=722;
                $y=1061;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_cm);

                imagejpeg($img_source,"outputs/womens/jackets/jpg/".$sku."_M.jpg",100);
                imagedestroy($img_source);

                header("Location: womens-jackets-import.php");

            }

            fclose($csvFile);
         
    }
    else
    {
        echo "Please select valid file";
    }
}