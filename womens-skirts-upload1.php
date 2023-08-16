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


                // echo $sku;
                // echo "<br />";
                // echo $waist_in;
                // echo "<br />";
                // echo $waist_cm;
                // echo "<br />";
                // echo $hip_in;
                // echo "<br />";
                // echo $hip_cm;
                // echo "<br />";
                // echo $body_length_in;
                // echo "<br />";
                // echo $body_length_cm;
                // echo "<br />";
                // echo $sweep_in;
                // echo "<br />";
                // echo $sweep_cm;

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

                $bbox0 = imagettfbbox(18, 0, $font, $text_color);
                $x = 373 - ($bbox0[0] / 2);
                // $x=373;
                $y=477;
                imagettftext($img_source,18,0,$x,$y,$text_color,$font,$sku);

                $bbox1 = imagettfbbox(26, 0, $font2, $text_color);
                $x = 450 - ($bbox1[1] / 2);
                // $x=450;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_in);

                $bbox2 = imagettfbbox(26, 0, $font2, $text_color);
                $x = 707 - ($bbox2[2] / 2);
                // $x=707;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);

                $bbox3 = imagettfbbox(26, 0, $font2, $text_color);
                $x = 450 - ($bbox3[3] / 2);
                // $x=450;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$hip_in);

                $bbox4 = imagettfbbox(20, 0, $font2, $text_color);
                $x = 707 - ($bbox4[4] / 2);
                // $x=707;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$hip_cm);

                $bbox5 = imagettfbbox(20, 0, $font2, $text_color);
                $x = 450 - ($bbox5[5] / 2);
                // $x=450;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$body_length_in);

                $bbox6 = imagettfbbox(20, 0, $font2, $text_color);
                $x = 707 - ($bbox6[6] / 2);
                // $x=707;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$body_length_cm);

                $bbox7 = imagettfbbox(20, 0, $font2, $text_color);
                $x = 450 - ($bbox7[7] / 2);
                // $x=450;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_in);

                $bbox8 = imagettfbbox(20, 0, $font2, $text_color);
                $x = 707 - ($bbox8[8] / 2);
                // $x=707;
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