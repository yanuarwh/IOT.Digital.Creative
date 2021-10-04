<?php  

class Temperature_model extends CI_Model
{
	public function getTemperature( $id = null )
	{
		if( $id === null ) {
			return $this-> db -> get('temperature')->result_array();
		} else {
			return $this-> db ->get_where('temperature',['id' => $id ])-> result_array();
		} 
	}

	public function deleteTemperature( $id  )
	{
		$this-> db ->delete('temperature',['id' => $id ]);
		return $this-> db ->affected_rows();
	}

	public function createTemperature( $data  )
	{
		$this-> db -> insert( 'temperature', $data ) ;
		return $this-> db ->affected_rows();

	}

	public function updateTemperature( $data, $id )
	{
		$this-> db ->update('temperature', $data ,['id' => $id ]);
		return $this-> db ->affected_rows();
	}


}