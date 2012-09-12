Rotten-Tomatoes-API-CodeIgniter-Library
=======================================
Rotten Tomatoes Movie Database API CodeIgniter Library

by Jake Monton - <montonjake89@gmail.com>
======================================
A basic Rotten Tomatoes API CodeIgniter Library wrapper.

/**
 * Rotten tomatoes v1.0 
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

/** Sample way of using the Rotten Tomatoes API CodeIgniter Library
 * // set RottenTomatoes API Key and return format
 * $rotten = array('api_key' => 'xxxxxxxxxxxxxxxxxxxxxxxx', 'format' =>'json');
 * // load RottenTomatoes library
 * $this->load->library('RottenTomatoes', $rotten, 'rotten');
 * $movie_from = 'in_theaters';  // in_theaters, box_office, opening, upcoming 
 * $page_limit = 45;
 * $page = 1;
 * $movies = $this->rotten->getMovies($movie_from, $page_limit, $page);  

