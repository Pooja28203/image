<?php include "header.php"; ?>

<?php 
if(!isset($_SESSION["login"]))

    header("location:login.php"); 
?>

<main class="main">

    <section id="wrapper" class="section container-fluid wrapper">

        <div class="row no-gutters box">
            <div class="col-12 col-sm-2 columns">

                <?php include "sidebar.php"; ?> 

            </div>
            <div class="col-12 col-sm-10">

                <!-- Banner [Start] -->
                <section id="category" class="section container-fluid category">
                    <div class="row no-gutters justify-content-center headline">
                        <div class="col-12">
                            <h3>Jeans Data</h3>
                        </div>
                    </div>
                    <div class="row no-gutters justify-content-center content scroll-content">
                        <div class="col-12 col-sm-10">
                            <?php
                            $sql = "SELECT * FROM womens_jackets";
                            $result = mysqli_query($connection, $sql);  


                            if (mysqli_num_rows($result) > 0) {
                                echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                                    <thead><tr>
                                        <th>ID</th>
                                        <th>SKU</th>
                                        <th>Image (JPG)</th>
                                    </tr></thead><tbody>";

                                while($row = mysqli_fetch_assoc($result)) {

                                echo "<tr>
                                        <td>" . $row['id']."</td>
                                        <td>" . $row['sku']."</td>
                                        <td align='center'><a class='download-btn' href='outputs/womens/jackets/jpg/" . $row['sku']."_M.jpg' download='" . $row['sku']."'>Download</a></td></tr>";
                                }
                                echo "</tbody></table></div>";
                              
                            } else {
                                echo "you have no records";
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <!-- Banner [End] -->

            </div>
        </div>

    </section>

</main>

<?php include "footer.php"; ?>