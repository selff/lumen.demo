<?php

class CountriesTest extends TestCase
{
    /**
     * /countries [GET]
     */
    public function testShouldReturnAllCountries(){

        $this->get("api/countries", []);
        $this->seeStatusCode(200);
    }

    /**
     * /products [POST]
     */
    public function testShouldCreateCountry(){

        $randomCode = chr(rand(97,122)) . chr(rand(97,122));
        $parameters = [
            'code' => $randomCode
        ];
        $this->post("api/countries", $parameters, []);
        $this->seeStatusCode(201);
        $this->get("api/countries", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([$randomCode]);
    }
}
