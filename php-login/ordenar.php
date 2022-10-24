<?php
        require 'partials/partial.php';

            if(!isset($_SESSION['coords'])){
                $_SESSION['coords'] = array();
            }

            $var = count($_SESSION['data']) - 1;

            if(isset($_POST['searchAddress'])) {

                    $geocodeData = getGeocodeData($_SESSION['data'][$var]);
                    if($geocodeData) {
                        $latitude = $geocodeData[0];
                        $longitude = $geocodeData[1];
                        $address = $_SESSION['data'][$var];

                        array_push($_SESSION['coords'], array($address, $latitude, $longitude));

                    } else {
                        echo "Incorrect details to show map!";
                        }


                    $_SESSION['data'] = array_column($_SESSION['coords'], 0);
            }
?>