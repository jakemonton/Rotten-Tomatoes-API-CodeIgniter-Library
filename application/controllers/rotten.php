<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Rotten Tomatoes sample Controller
 * @author ekaj_03
 * @version 0.0.1
 * @copyright 2012. All Rights Reserved
 */

class Rotten extends CI_Controller 
{
    
    public function __construct(){
		parent::__construct();

		// set RottenTomatoes API Key and return format
		$rotten = array('api_key' => 'YOUR_API_KEY', 'format' =>'json');
		// load RottenTomatoes library
		$this->load->library('RottenTomatoes', $rotten, 'rotten');
	}
		
	function getMovies(){
		$movies = $this->rotten->getMovies('in_theaters', 45, 1);
		print_r($movies);
	}
		
	function searchMovie($keyword){
		$movies = $this->rotten->searchMovie(urlencode($keyword), 45, 1);
		print_r($movies);
	}
}