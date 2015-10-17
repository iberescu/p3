<?php 
namespace App\Classes;
 
class Password{
 
	public static function validate($request) {
		$error = 0;
		if (empty($request['separator']))
		{
			$error = 'Separator is empty';
		}
		if (strlen($request['separator']) > 1)
		{
			$error = 'Separator can have only 1 character';
		}
		if ((int)($request['minWords']) > 10 || (int)($request['minWords']) < 2)
		{
			$error = 'Words value incorrect';
		}
		return $error;
	}
	public static function createPass($database,$request)
	{
		$separator = $request['separator'];
		$words_count = $request['minWords'];		
		$selected = array_rand($database,$words_count);
		for ($i = 0; $i < count($selected); $i ++)
		{
			$value = trim($database[$selected[$i]]);
			//upercase
			if (isset($request['firstUpper']) && $request['firstUpper']) $value = ucwords($value);		
			
			$result[] = $value;
		}
		return implode($separator,$result);		
		
	}
	public static function getDb()
	{
		return explode("\n",file_get_contents(storage_path().'/words.db'));
	}
}
 