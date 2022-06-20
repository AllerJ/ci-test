<?php

class Location extends CI_Controller {

		public function __construct()
		{
			# Load the libraries need to run
			parent::__construct();
			$this->load->model('location_model');
			$this->load->helper('url_helper');
			$this->load->library("session");
			$this->load->helper('html');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index()
		{

			# Define our form validation
			$this->form_validation->set_rules('origin', 'Origin', 'required');
			$this->form_validation->set_rules('destination', 'Destination', 'required');

			# Check to see if the form validation ran.
			# If not show the blank form.

			if ($this->form_validation->run() === FALSE)
			{
				# Get all locations back from database
				$data['locations'] = $this->location_model->get_news();

				# Load the view
				$this->load->view('templates/header', $data);
				$this->load->view('index', $data);
				$this->load->view('templates/footer');

			}
			else
			{

			# If yes, process the API call and display the view

				# Google API Endpoint for Distancematrix
				$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.urlencode($this->input->post('origin')).'&destinations='.urlencode($this->input->post('destination')).'&units=imperial&key='.getenv('GOOGLE_API_SEARCH');

				# Go out to the interwebs to the Google API and
				# return a JSON response
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_HEADER, false);
				$output = curl_exec($curl);
				curl_close($curl);

				#Convert the result of the CURL call into a usable array
				$result = json_decode($output, true);

				# Extract just the Distance and Duration from the returned JSON
				$distance = $result['rows'][0]['elements'][0]['distance']['text'];
				$time = $result['rows'][0]['elements'][0]['duration']['text'];

				# Package our variables nicely to send to the
				# model for storage in the database.
				$data = [
					'distance' => $distance,
					'time'	=> $time,
					'origin' => $this->input->post('origin'),
					'destination' => $this->input->post('destination')
				];

				# Set a flash message to appear with the results
				# of the API call on the frontend.
				$this->session->set_flashdata('info', '<h4>The Distance between '.$this->input->post('origin').'<br> and '.$this->input->post('destination').' is '.$distance.'. <br> The travel time is calculated as '.$time.'</h4>');

				# Send data to model
				$this->location_model->set_location($data);

				# Get all locations back from database
				$data['locations'] = $this->location_model->get_news();

				# Load the view
				$this->load->view('templates/header', $data);
				$this->load->view('index', $data);
				$this->load->view('templates/footer');

			}
		}


}
