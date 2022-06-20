<?php

class Location_model extends CI_Model {

		public function __construct()
		{
				$this->load->database();
		}

		public function get_locations()
		{
				$query = $this->db->get('location');
				return $query->result_array();
		}

		public function set_location($param)
		{

			$data = array(
				'destination' => $param['destination'],
				'origin' => $param['origin'],
				'distance' => $param['distance'],
				'duration' => $param['time'],
			);

			return $this->db->insert('location', $data);
		}

}
