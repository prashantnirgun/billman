<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /*
  class Guzzle {

    public function __construct(){
      //require FCPATH.'application/vendor/autoload.php';
    }
    public function Guzzle() {
      // require_once('vendor/autoload.php');
      require 'vendor/autoload.php';
    }
  }
*/
  class Guzzle
  {

    public $client;
    public function __construct()
    {
        $this->client = new GuzzleHttp\Client();
    }
  }

/*
//how to call it
public function f3()
  {
    #guzzle library add to use guzzle
    $this->load->library('guzzle');

    # guzzle client define
    //$client     = new GuzzleHttp\Client();

    #This url define speific Target for guzzle
    //$url        = 'http://www.google.com';

    #guzzle
    try {
      # guzzle post request example with form parameter
      $response = $this->guzzle->client->request( 'GET',
                                     $url); /*,
                                    [ 'form_params'
                                          => [ 'processId' => '2' ]
                                    ]
                                  ); */
      #guzzle repose for future use
      echo $response->getStatusCode(); // 200
      echo $response->getReasonPhrase(); // OK
      echo $response->getProtocolVersion(); // 1.1
      echo $response->getBody();
    } catch (GuzzleHttp\Exception\BadResponseException $e) {
      #guzzle repose for future use
      $response = $e->getResponse();
      $responseBodyAsString = $response->getBody()->getContents();
      print_r($responseBodyAsString);
    }
  }

?>
