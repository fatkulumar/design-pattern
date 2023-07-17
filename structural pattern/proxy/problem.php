<?php

    /**
     * Pattern yang berfungsi sebagai penengah atau penghubung
     * antara konsumer dan class yang di konsumsi
    */

    interface iCovid
    {
        function getData(): array;
    }

    class Covid implements iCovid
    {
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
            return [
                'confirmed' => $confirmed,
                'recovered' => $recovered,
                'deaths' => $deaths
            ];
        }
    }

    /**
     * Ketika kita pakai yang seperti ini ketika internet kita lambat jumlahnya terpotong
     * maka pattern ini solusinya
    */

    $covid = new Covid('id');
    $result = $covid->getData();
    echo json_encode($result);