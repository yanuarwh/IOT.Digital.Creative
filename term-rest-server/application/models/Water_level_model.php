<?php  

class Water_level_model extends CI_Model
{
    public function getWaterlevel( $id = null )
    {
        if( $id === null ) {
            return $this-> db -> get('water_level')->result_array();
        } else {
            return $this-> db ->get_where('water_level',['id' => $id ])-> result_array();
        } 
    }

    public function deleteWaterlevel( $id )
    {
        $this-> db ->delete('water_level',['id' => $id ]);
        return $this-> db ->affected_rows();
    }

    public function createWaterlevel( $data  )
    {
        $this-> db -> insert( 'water_level', $data ) ;
        return $this-> db ->affected_rows();

    }








    public function updateWaterlevel( $data )
    {


        date_default_timezone_set('Asia/Jakarta');
        


        $this-> db -> insert('water_level',['Water_level'=> $data, 'time'=> date('Y/m/d H:i:s')]);

        return $this-> db ->affected_rows();



    }


}