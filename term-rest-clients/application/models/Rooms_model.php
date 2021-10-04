<?php  

use GuzzleHttp\Client;


class Rooms_model extends CI_model {
	public function getallRooms() 
	{
		$client=new Client();

		$response = $client->request('GET','http://localhost/rest-api/term-rest-server/api/temperature',[

			'query'=> [
				'wpu-key'=>'wpu123'

			]

		]);

		$result= json_decode($response->getBody()->getContents(),true);

		return $result['data'];
	}
}