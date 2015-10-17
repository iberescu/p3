<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Password;


class GenerateController extends Controller {

    public function __construct(Request $request) {
        # Put anything here that should happen before any of the other actions
		$this->_request = $request->all();
    }


    /**
     * Responds to requests to POST /generate/password
     */
    public function postPassword() {
		$result = '';
		if ($error = Password::validate($this->_request))
		{
		   echo json_encode(array('error' => $error));
		   exit;
		}

		$database = Password::getDb();

		//create password
		$result = Password::createPass($database,$this->_request);

		//append number
		if (isset($this->_request['appendNumbers']) && $this->_request['appendNumbers']) $result .= rand(1,9);

		//append special char
		if (isset($this->_request['addSpecial']) && $this->_request['addSpecial']) $result .= '@';

		echo json_encode(array('result' => $result));
		exit;	 
	   
    }
    /**
     * Responds to requests to POST /generate/lorem
     */	
    public function postLorem() {
		$generator = new \Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($this->_request['paragraf']);
 
		echo json_encode(array('result' => implode('<p>', $paragraphs)));
		exit;
		
    }	 
	
    /**
     * Responds to requests to POST /generate/lorem
     */	
    public function postUsers() {
		$users = array();
		$faker = \Faker\Factory::create();
		
		for ($i = 1;$i <= $this->_request['usersnumber'];$i++)
		{
			$users[] = implode(', ',array(
				"name" => $faker->name,
				"birthdate" => $faker->dateTimeThisCentury->format("Y-m-d"),
				"profile" => $faker->text
			));
		}
		echo json_encode(array('result' => implode('<p>', $users)));
		exit;		
    }		
}