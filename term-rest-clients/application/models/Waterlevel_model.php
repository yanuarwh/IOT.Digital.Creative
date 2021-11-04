<?php  

use GuzzleHttp\Client;


class Waterlevel_model extends CI_model {
	public function getallWaterlevel() 
	{
		$client=new Client();

		$response = $client->request('GET','http://localhost/rest-api/term-rest-server/api/water_level',[

			'query'=> [
				'wpu-key'=>'wpu123'

			]

		]);

		$result= json_decode($response->getBody()->getContents(),true);

		return $result['data'];
	}
}