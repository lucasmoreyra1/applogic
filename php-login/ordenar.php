<?php
        require 'partials/partial.php';
        require 'getDistance.php';


            if(!isset($_SESSION['coords'])){
                $_SESSION['coords'] = array();
            }

            $var = count($_SESSION['data']) - 1;

            if(!empty($_SESSION['data'])) {

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


            $coords = $_SESSION['coords'];

            foreach ($coords as $key => $row) {
                $orden1[$key] = $row['1'];
                $orden2[$key] = $row['2'];
            }
        if(!empty($_SESSION['data'])){
            array_multisort($orden1, SORT_ASC, $orden2, SORT_ASC, $coords);
            foreach ($coords as $key => $row) {
                echo $row['0'].' '.$row['1'].' '.$row['2']. '<br/>';
            }

        }



/*         $aDistancia = array();
        $menor = array($coords[0]);
        
        for($var = 1; $var < count($coords); $var++){
            
            if($coords[$var][1] < $menor[1]){
                $menor = $coords[$var][1]
            }

            array_push($aDistancia, array($coords[$var][0], $temp));
        }

        print_r($coords); */
?>