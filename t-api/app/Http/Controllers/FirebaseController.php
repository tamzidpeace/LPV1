<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class FirebaseController extends Controller

{


	public function index(){

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');

		$firebase= (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://laravel-firebase-55b5c.firebaseio.com/')
                        ->create();

		$database 		= $firebase->getDatabase();
		$value 		 = $database->getReference('blog')->push(['name' => 'arafat', 'role' => '2', 'key' => '1'])->getKey();

		
		$data = ['key' => $value];

		$final = $database->getReference('/blog/'.$value)
   				->update($data);
		
		echo"<pre>";		
		
		

		print_r($final);

	}

}