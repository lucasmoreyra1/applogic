<?php
        require 'partials/partial.php';
        require 'getDistance.php';


            $coords = array();
            if(!empty($_SESSION['data'])) {
                $coords = array();

                for($var=0; $var<count($_SESSION['data']); $var++){

                    $geocodeData = getGeocodeData($_SESSION['data'][$var]);
                    if($geocodeData) {
                        $latitude = $geocodeData[0];
                        $longitude = $geocodeData[1];
                        $address = $_SESSION['data'][$var];

                        array_push($coords, array($address, $latitude, $longitude));

                    } else {
                        echo "Incorrect details to show map!";
                        }

                }

            }



        $aDistancia = array();
        for($var = 0; $var < count($coords); $var++){
            $temp = distance(-33.358439, -60.201501 , $coords[$var][1], $coords[$var][2], "K");
            array_push($aDistancia, array($coords[$var][0], $temp));
        }

        print_r($coords);
?>