<?php

error_reporting(E_ALL);

include "includes/config.php";
 
if (isset($_POST['submit']))
{

    // header("content-type: image/jpg");
 
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

                // $xValue0 = 373;
                // $xValue1 = 450;
                // $xValue2 = 707;

                global $xValue1;
                global $xValue2;

                // if ((strlen($waist_in) || strlen($hip_in) || strlen($body_length_in) || strlen($sweep_in)) == 2) {
                //     $xValue1 = 465;
                // }
                // else if ((strlen($waist_in) || strlen($hip_in) || strlen($body_length_in) || strlen($sweep_in)) == 4) {
                //     $xValue1 = 452;
                // }
                // else if ((strlen($waist_in) || strlen($hip_in) || strlen($body_length_in) || strlen($sweep_in)) == 5) {
                //     $xValue1 = 445;
                // }

                // if(in_array("2", array(strlen($waist_in),strlen($hip_in),strlen($body_length_in),strlen($sweep_in)))) {
                //     $xValue1 = 465;
                //     echo "pass2";
                // }
                // else if(in_array("4", array(strlen($waist_in),strlen($hip_in),strlen($body_length_in),strlen($sweep_in)))) {
                //     $xValue1 = 452;
                //     echo "pass4";
                // }
                // else if(in_array("5", array(strlen($waist_in),strlen($hip_in),strlen($body_length_in),strlen($sweep_in)))) {
                //     $xValue1 = 445;
                //     echo "pass5";
                // }

                // if (strlen($waist_cm) === 2) {
                //     // $xValue1 = 465;
                //     $x=465;
                //     $y=673;
                //     imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);
                // }
                // else if (strlen($waist_cm) === 4) {
                //     // $xValue1 = 452;
                //     $x=452;
                //     $y=673;
                //     imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);
                // }
                // else if (strlen($waist_cm) === 5) {
                //     // $xValue1 = 445;
                //     $x=445;
                //     $y=673;
                //     imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);
                // }
                // else if ((strlen($waist_cm)) || (strlen($hip_cm)) || (strlen($body_length_cm)) || (strlen($sweep_cm)) == 2) {
                //     $xValue2 = 722;
                // }
                // else if ((strlen($waist_cm)) || (strlen($hip_cm)) || (strlen($body_length_cm)) || (strlen($sweep_cm)) >= 3) {
                //     $xValue2 = 709;
                // }
                // else ((strlen($waist_cm)) || (strlen($hip_cm)) || (strlen($body_length_cm)) || (strlen($sweep_cm)) >= 4) {
                //     $xValue2 = 702;
                // }

                echo "<br />";
                echo $sku;
                echo "<br />";
                echo strlen($waist_in);
                echo "-",$xValue1;
                echo "<br />";
                echo strlen($hip_in);
                echo "-",$xValue1;
                echo "<br />";
                echo strlen($body_length_in);
                echo "-",$xValue1;
                echo "<br />";
                echo strlen($sweep_in);
                echo "-",$xValue1;
                echo "<br />";
                echo strlen($waist_cm);
                echo "-",$xValue2;
                echo "<br />";
                echo strlen($hip_cm);
                echo "-",$xValue2;
                echo "<br />";
                echo strlen($body_length_cm);
                echo "-",$xValue2;
                echo "<br />";
                echo strlen($sweep_cm);
                echo "-",$xValue2;
                echo "<br />";

                $x=373;
                $y=485;
                imagettftext($img_source,18,0,$x,$y,$text_color,$font,$sku);

                $x=$xValue1;
                $y=673;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_in);

                if (strlen($waist_cm) == 2) {
                    // $xValue1 = 465;
                    $x=465;
                    $y=673;
                    imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);
                }
                else if (strlen($waist_cm) == 4) {
                    // $xValue1 = 452;
                    $x=452;
                    $y=673;
                    imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);
                }
                else if (strlen($waist_cm) == 5) {
                    // $xValue1 = 445;
                    $x=445;
                    $y=673;
                    imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$waist_cm);
                }

                $x=$xValue1;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$hip_in);

                $x=$xValue2;
                $y=771;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$hip_cm);

                $x=$xValue1;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$body_length_in);

                $x=$xValue2;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$body_length_cm);

                $x=$xValue1;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_in);

                $x=$xValue2;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$sweep_cm);

                // imagejpeg($img_source,"outputs/womens/skirts/jpg/".$sku."_M.jpg",100);
                // imagedestroy($img_source);

                // header("Location: womens-skirts-import.php");

            }

            fclose($csvFile);
         
    }
    else
    {
        echo "Please select valid file";
    }
}