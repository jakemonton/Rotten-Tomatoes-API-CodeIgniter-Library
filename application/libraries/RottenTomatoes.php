<?php
/**
 * Rotten Tomatoes v1.0 
 * PHP class - wrapper to Rotten Tomatoes v1.0 API
 * API Documentation - http://developer.rottentomatoes.com/docs
 * 
 * @author ekaj_03 <montonjake89@gmail.com>
 * @copyright 2012 ekaj_03
 * @date 2012-09-11
 * @link https://github.com/ekaj03/Rotten-Tomatoes-API-CodeIgniter-Library
 * @version 0.0.1
 * 
 */
 
 
 class RottenTomatoes {
 	
	const API_URL = "http://api.rottentomatoes.com/api/public/";
	const VERSION = "v1.0";
	
	private $_format;	/* format i.e json */
	private $_apikey;   /* the API key */

	
	function __construct($data){
		/* Set API Key */
		$this->setApiKey($data['api_key']);
		/* Set return format */
		$this->setFormat($data['format']);
	}
	
	/**
	 * Get Movies either box office, in theaters, opening and upcoming movies
	 * @param string $action   (action to be executed i.e, box_office, in_theaters, opening and upcoming)
	 * @param int $limit   page_limit
	 * @param int $page
	 */
	public function getMovies($action, $limit, $page){
		$add_uri = 'page_limit='.$limit.'&page='.$page;
		return $this->_call('lists/movies/'.$action, $add_uri);
	}
	
	/**
	 * Get Movies with DVD release
	 * @param string $action   (action to be executed i.e, top_rentals, current_releases, new_releases, upcoming)
	 * @param int $limit   page_limit
	 * @param int $page
	 */
	public function getDvd($action, $limit, $page){
		$add_uri = 'page_limit='.$limit.'&page='.$page;
		return $this->_call('lists/dvds/'.$action, $add_uri);
	}
	
	/**
	 * Get Movie Info
	 * @param int $movie_id
	 */
	public function getMovieInfo($movie_id){
		return $this->_call('movies/'.$movie_id, '');
	}
	
	/**
	 * Search particular movie
	 * @param string $keyword
	 * @param int $limit
	 * @param int $page
	 */
	public function searchMovie($keyword, $limit, $page){
		$add_uri = 'q='.$keyword.'&page_limit='.$limit.'&page='.$page;
		return $this->_call('movies', $add_uri);
	}
	
	/**
	 * Get the complete list of movie cast for a movie
	 * @param int $movie_id
	 */
	public function getMovieCast($movie_id){
		return $this->_call('movies/'.$movie_id.'/cast', '');
	}
	
	/**
	 * Get related movie clips and trailers for a movie
	 * @param int $movie_id
	 */
	public function getMovieClips($movie_id){
		return $this->_call('movies/'.$movie_id.'/clips', '');
	}
	
	/**
	 * Get similar movie for a movie.
	 * @param int $movie_id
	 * @param int $limit
	 */
	public function getSimilarMovies($movie_id, $limit){
		$add_uri = 'limit='.$limit;
		return $this->_call('movies/'.$movie_id.'/similar', $add_uri);
	}
	
	/**
	 * Process every call to the API 
	 * @param string $action
	 * @param string $add_uri
	 * @return array
	 */
	private function _call($action, $add_uri){
		$url = RottenTomatoes::API_URL.RottenTomatoes::VERSION.'/'.$action.'.'.$this->getFormat().'?apikey='.$this->getApiKey();
		if($add_uri != '')
			$url = $url.'&'.$add_uri;
		// setup cURL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		echo $error;
		
		$results = json_decode($data, true);
		return (array) $results;
	}

	/**
	 * Set API Key
	 * @param string $api_key
	 * @return void
	 */
	private function setApiKey($api_key){
		$this->_apikey = (string) $api_key;
	}
	
	/**
	 * Getter for API Key
	 * @return string 
	 */
	private function getApiKey(){
		return $this->_apikey;
	}
	
	/**
	 * Set Format
	 * @param string $format
	 * @return void
	 */
	private function setFormat($format){
		$this->_format = (string) $format;
	}
	
	/**
	 * Getter for Format
	 * @return string
	 */
	private function getFormat(){
		return $this->_format;
	}
 }
