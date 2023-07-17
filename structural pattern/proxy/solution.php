<?php
    
    interface ICovid
    {
        function getData(): array;
    }

    class Covid implements ICovid
    {
        public $temporary;
        public string $country;

        function __construct($country) {
            $this->country = $country;
        }
        
        function getData(): array {
            $url = "https://covid19.mathdro.id/api/countries/" . $this->country;
            $data = file_get_contents($url);
            $jsonData = json_decode($data, true);

            $confirmed = isset($jsonData['confirmed']['value']) ? $jsonData['confirmed']['value'] : 2123;
            $recovered = isset($jsonData['recovered']['value']) ? $jsonData['recovered']['value'] : 2443;
            $deaths = isset($jsonData['deaths']['value']) ? $jsonData['deaths']['value'] : 989;

            $confirmed = [
                'value' => $confirmed
            ];
            
            $recovered = [
                'value' => $recovered
            ];
            
            $deaths = [
                'value' => $deaths
            ];
            
            $data = [
                'confirmed' => $confirmed,
                'recovered' => $recovered,
                'deaths' => $deaths
            ];
            $this->temporary = $data;
            return $data;
        }
    }

    class ProxyCovid implements ICovid
    {
        public Covid $covid;

        function __construct($covid) {
            $this->covid = $covid;
        }
        
        function getData(): array {
            if($this->covid->temporary) {
                echo "dapat dari database" . PHP_EOL;
                return $this->covid->temporary;
            }
            $data = $this->covid->getData();
            $this->covid->temporary = $data;
            echo 'di dapat dari covid API' . PHP_EOL;
            return $data;
        }
    }

    $covid1 = new ProxyCovid(new Covid('id'));
    echo json_encode($covid1->getData());

    $covid2 = new ProxyCovid(new Covid('id'));
    echo json_encode($covid2->getData());