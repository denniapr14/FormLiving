<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappAPI extends Controller
{

    private $id;
    private $key;

    public function __construct(){
    // parent::__construct();
      $this->id = "2932";
      $this->key = "affa120ab274776536bee5b9644f0afca9166e59";

    }
      public function sendText($number, $message){
      $data['number'] = $number;
      $data['message'] = $message;
      $url = "http://onyxberry.com/services/wapi/api2/sendText";
      return $this->send_request($data, $url);
    }
    public function sendFromURL($number, $media_url, $caption = ''){
      $data['number'] = $number;
      $data['url'] = $media_url;
      $data['caption'] = $caption;
      $url = "http://onyxberry.com/services/wapi/api2/sendFromURL";
      return $this->send_request($data, $url);
    }
    public function sendTextInGroup($group_name, $message){
      $data['groupName'] = $group_name;
      $data['message'] = $message;
      $url = "http://onyxberry.com/services/wapi/api2/sendTextInGroup";
      return $this->send_request($data, $url);
    }
    public function sendFromURLInGroup($group_name, $media_url, $caption = ''){
      $data['groupName'] = $group_name;
      $data['url'] = $media_url;
      $data['caption'] = $caption;
      $url = "http://onyxberry.com/services/wapi/api2/sendFromURLInGroup";
      return $this->send_request($data, $url);
    }
    public function send_request($data, $url){

      $url = $url.'/'.$this->id.'/'.$this->key;
      $ch = curl_init( $url );
      curl_setopt( $ch, CURLOPT_POST, 1);
      curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt( $ch, CURLOPT_HEADER, 0);
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

      $response = curl_exec( $ch );
      return $response;
    }
}