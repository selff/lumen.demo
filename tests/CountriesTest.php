<?php

class CountriesTest extends TestCase
{
    /**
     * /countries [GET]
     */
    public function testShouldReturnAllCountries(){

        $this->get("countries", []);
        $this->seeStatusCode(200);
    }

    /**
     * /products [POST]
     */
    public function testShouldCreateCountry(){

        $parameters = [
            'code' => chr(rand(97,122)) . chr(rand(97,122))
        ];

        $this->post("countries", $parameters, []);
        $this->seeStatusCode(200);
    }
}
