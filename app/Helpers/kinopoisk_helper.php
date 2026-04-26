<?php

use CodeIgniter\CodeIgniter;

function get_rating(int $id): object
{
	$out = new \stdClass();
	$out->kp_rating = (float) 0;
	$out->kp_votes = (int) 0;
	$out->imdb_rating = (float) 0;
	$out->imdb_votes = (int) 0;
	$out->error = (bool) FALSE;
	$out->error_text = (string) '';

	if ( !$id ) {
		$out->error = TRUE;
		$out->error_text = 'Invalid ID !';
		return $out;
	}

	$options = [
		'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 OPR/130.0.0.0',
		'timeout' => 5,
	];

	$kpurl = 'https://rating.kinopoisk.ru/' . $id . '.xml';
	        
	$client = service('curlrequest', $options);
	$response = $client->get($kpurl);

	if ( $response->getStatusCode() !== 200 ) {
		$out->error = TRUE;
		$out->error_text = 'Error. Status code: ' . $response->getStatusCode();
		return $out;
	}
//	$imgSize = $response->getHeaderLine('Content-Length');
	$type = $response->getHeaderLine('Content-Type');

	if ( !str_contains($type, 'xml') ) {
		$out->error = TRUE;
		$out->error_text = 'Not XML';
		return $out;
	}

	$data = $response->getBody();

	if ( !str_contains($data, 'xml') ) {
		$out->error = TRUE;
		$out->error_text = 'Not XML';
		return $out;
	}

	$xml = simplexml_load_string($data);

	$out->kp_rating = (float) $xml->kp_rating;
	$out->kp_votes = (int) $xml->kp_rating->attributes()->num_vote;
	$out->imdb_rating = (float) $xml->imdb_rating;
	$out->imdb_votes = (int) $xml->imdb_rating->attributes()->num_vote;
	$out->error = FALSE;
	$out->error_text = '';

	return $out;

	function colorize_rating(object $data): object
	{
		if ( $data->kp_rating < 5 ) {
			$data->kp_rating = '<span class="text-danger">' . $data->kp_rating . '</span>';
		}
		else if ( $data->kp_rating > 5 && $data->kp_rating < 7 ) {
			$data->kp_rating = '<span class="text-muted">' . $data->kp_rating . '</span>';
		}
		else if ( $data->kp_rating > 7 ) {
			$data->kp_rating = '<span class="text-success">' . $data->kp_rating . '</span>';
		}
		else {
			$data->kp_rating = $data->kp_rating;
		}

		return $data;	
	}
}
