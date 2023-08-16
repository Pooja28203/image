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
                $bib_height_in = $getData[5];
                $bib_height_cm = $getData[6];
                $rise_in = $getData[7];
                $rise_cm = $getData[8];
                $inseam_in = $getData[9];
                $inseam_cm = $getData[10];
                $leg_opening_in = $getData[11];
                $leg_opening_cm = $getData[12];
                $outseam_in = $getData[13];
                $outseam_cm = $getData[14];

                $query = "SELECT id FROM womens_recplg_dungarees WHERE sku = '" . $getData[0] . "'";
 
                $check = mysqli_query($connection, $query);
 
                if ($check->num_rows > 0)
                {
                    $result = mysqli_query($connection, "UPDATE womens_recplg_dungarees SET waist_in = '" . $waist_in . "', waist_cm = '" . $waist_cm . "', hip_in = '" . $hip_in . "', hip_cm = '" . $hip_cm . "', rise_in = '" . $rise_in . "', rise_cm = '" . $rise_cm . "', bib_height_in = '" . $bib_height_in . "', bib_height_cm = '" . $bib_height_cm . "', inseam_in = '" . $inseam_in . "', inseam_cm = '" . $inseam_cm . "', leg_opening_in = '" . $leg_opening_in . "', leg_opening_cm = '" . $leg_opening_cm . "', outseam_in = '" . $outseam_in . "', outseam_cm = '" . $outseam_cm . "'");
                }
                else
                {
                    $result = mysqli_query($connection, "INSERT INTO womens_recplg_dungarees (sku, waist_in, waist_cm, hip_in, hip_cm, rise_in, rise_cm, bib_height_in, bib_height_cm, inseam_in, inseam_cm, leg_opening_in, leg_opening_cm, outseam_in, outseam_cm) VALUES ('" . $sku . "','" . $waist_in . "','" . $waist_cm . "','" . $hip_in . "','" . $hip_cm . "','" . $rise_in . "','" . $rise_cm . "','" . $bib_height_in . "','" . $bib_height_cm . "','" . $inseam_in . "','" . $inseam_cm . "','" . $leg_opening_in . "','" . $leg_opening_cm . "','" . $outseam_in . "','" . $outseam_cm . "')");
                }

                if($result)
                {
                    echo "Success";
                }
                else
                {
                    echo "Error";
                }

                $file_name='templates/womens/dungarees/regular-cropped-long/jpg/template.jpg';

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
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$bib_height_in);
                $x=717;
                $y=867;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$bib_height_cm);
                $x=460;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$rise_in);
                $x=717;
                $y=965;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$rise_cm);
                $x=460;
                $y=1061;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$inseam_in);
                $x=717;
                $y=1061;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$inseam_cm);
                $x=460;
                $y=1159;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$leg_opening_in);
                $x=717;
                $y=1159;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$leg_opening_cm);
                $x=460;
                $y=1256;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$outseam_in);
                $x=717;
                $y=1256;
                imagettftext($img_source,26,0,$x,$y,$text_color,$font2,$outseam_cm);

                imagejpeg($img_source,"outputs/womens/dungarees/regular-cropped-long/jpg/".$sku."_M.jpg",100);
                imagedestroy($img_source);

                header("Location: womens-dungarees-recplg-import.php");

            }

            fclose($csvFile);
         
    }
    else
    {
        echo "Please select valid file";
    }
}