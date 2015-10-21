<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Password;
use Validator;
use Response;


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
		   return Response::json(array('error' => $error));
		}

		$database = Password::getDb();

		//create password
		$result = Password::createPass($database,$this->_request);

		//append number
		if (isset($this->_request['appendNumbers']) && $this->_request['appendNumbers']) $result .= rand(1,9);

		//append special char
		if (isset($this->_request['addSpecial']) && $this->_request['addSpecial']) $result .= '@';

		return Response::json(array('result' => $result));
    }
    /**
     * Responds to requests to POST /generate/lorem
     */	
    public function postLorem() {
		
		$rules = array('paragraf' => 'required|numeric|min:1|max:50');
		$validator = Validator::make($this->_request, $rules);

		// Validate the input and return correct response
		if ($validator->fails())
		{
			$errors = $validator->getMessageBag()->toArray();
			
			return Response::json(array(
				'success' => false,
				'error' => implode(',',$errors['paragraf'])
			));
		}
		
		$generator = new \Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($this->_request['paragraf']);
 
		return Response::json(array('result' => implode('<p>', $paragraphs)));
    }	 
	
    /**
     * Responds to requests to POST /generate/lorem
     */	
    public function postUsers() {
		$users = array();
		
		
		$rules = array('usersnumber' => 'required|numeric|min:1|max:50');
		$validator = Validator::make($this->_request, $rules);

		// Validate the input and return correct response
		if ($validator->fails())
		{
			$errors = $validator->getMessageBag()->toArray();
			
			return Response::json(array(
				'success' => false,
				'error' => implode(',',$errors['usersnumber'])
			));
		}		
		
		$faker = \Faker\Factory::create();
		
		for ($i = 1;$i <= $this->_request['usersnumber'];$i++)
		{
			$users[] = array(
				"name" => $faker->name,
				"birthdate" => $faker->dateTimeThisCentury->format("Y-m-d"),
				"profile" => $faker->text,
				"address" => $faker->address,
				"phone" => $faker->phoneNumber,
				"email" => $faker->email
			);
		}
		$content = view('users.list')->with('users',$users)->with('request',$this->_request)->render();
		
		return Response::json(array('result' => $content));
    }	
	    /**
     * Responds to requests to POST /generate/colors
     */	
    public function postColors() {
		
		$colors = \Colors\RandomColor::many($this->_request['colorsnumber'],
			array( 'hue' => $this->_request['palette'])
		);
		
		return Response::json(array('result' =>  $colors));
    }
}