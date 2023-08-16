<?php

include "includes/config.php";
 
if (isset($_POST['submit']))
{

    header("content-type: image/jpg");
 
    // Allowed mime types
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
                // Get row data
                $sku = $getData[0];
                $style = $getData[1];
                $waist_in = $getData[2];
                $waist_cm = round($getData[2]/0.39370);
                $rise_in = $getData[3];
                $rise_cm = round($getData[3]/0.39370);
                $hip_in = $getData[4];
                $hip_cm = round($getData[4]/0.39370);
                $inseam_in = $getData[5];
                $inseam_cm = round($getData[5]/0.39370);
                $legopening_in = $getData[6];
                $legopening_cm = round($getData[6]/0.39370);

                $query = "SELECT id FROM image WHERE sku = '" . $getData[0] . "'";
 
                $check = mysqli_query($connection, $query);
 
                if ($check->num_rows > 0)
                {
                    $result = mysqli_query($connection, "UPDATE image SET style = '" . $style . "', waist_in = '" . $waist_in . "', waist_cm = '" . $waist_cm . "', rise_in = '" . $rise_in . "', rise_cm = '" . $rise_cm . "', hip_in = '" . $hip_in . "', hip_cm = '" . $hip_cm . "', inseam_in = '" . $inseam_in . "', inseam_cm = '" . $inseam_cm . "', legopening_in = '" . $legopening_in . "', legopening_cm = '" . $legopening_cm . "'");
                }
                else
                {
                    $result = mysqli_query($connection, "INSERT INTO image (sku, style, waist_in, waist_cm, rise_in, rise_cm, hip_in, hip_cm, inseam_in, inseam_cm, legopening_in, legopening_cm) VALUES ('" . $sku . "','" . $style . "','" . $waist_in . "','" . $waist_cm . "','" . $rise_in . "','" . $rise_cm . "','" . $hip_in . "','" . $hip_cm . "','" . $inseam_in . "','" . $inseam_cm . "','" . $legopening_in . "','" . $legopening_cm . "')");
                }

                if($result)
                {
                    echo "Success";
                }
                else
                {
                    echo "Error";
                }

                header("Location: csv-import.php");

                $file_name='templates/mens/jeans/jpg/template.jpg';

                // $font='assets/fonts/Montserrat-Bold.ttf';
                // $font = dirname(__FILE__) . 'assets/fonts/Montserrat-Bold.ttf';
                // $font = dirname(__FILE__) . 'assets\fonts\Montserrat-Bold.ttf';
                // $font = './Montserrat-Bold.ttf';

                // $font = dirname(__FILE__) . '\timr65w.ttf';
                // $font = dirname(__FILE__) . '/timr65w.ttf';
                // $font = dirname(__FILE__) . 'timr65w.ttf';

                $x=181;
                $y=226;
                $img_source=imagecreatefromjpeg($file_name);
                $text_color=imagecolorallocate($img_source,14,39,39);
                imagettftext($img_source,15,$x,$y,$sku,$font,$text_color);
                $y=281;
                imagettftext($img_source,15,$x,$y,$style,$font,$text_color);
                $x=229;
                $y=396;
                imagettftext($img_source,15,$x,$y,$waist_in,$font,$text_color);
                $x=384;
                $y=396;
                imagettftext($img_source,15,$x,$y,$waist_cm,$font,$text_color);
                $x=229;
                $y=456;
                imagettftext($img_source,15,$x,$y,$rise_in,$font,$text_color);
                $x=384;
                $y=456;
                imagettftext($img_source,15,$x,$y,$rise_cm,$font,$text_color);
                $x=229;
                $y=515;
                imagettftext($img_source,15,$x,$y,$hip_in,$font,$text_color);
                $x=384;
                $y=515;
                imagettftext($img_source,15,$x,$y,$hip_cm,$font,$text_color);
                $x=229;
                $y=574;
                imagettftext($img_source,15,$x,$y,$inseam_in,$font,$text_color);
                $x=384;
                $y=574;
                imagettftext($img_source,15,$x,$y,$inseam_cm,$font,$text_color);
                $x=229;
                $y=631;
                imagettftext($img_source,15,$x,$y,$legopening_in,$font,$text_color);
                $x=384;
                $y=631;
                imagettftext($img_source,15,$x,$y,$legopening_cm,$font,$text_color);

                imagejpeg($img_source,"outputs/mens/jeans/jpg/".$sku."_8.jpg",100);
                imagedestroy($img_source);

            }

            fclose($csvFile);
         
    }
    else
    {
        echo "Please select valid file";
    }
}