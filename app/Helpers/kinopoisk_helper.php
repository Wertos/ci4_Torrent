<?php

use CodeIgniter\CodeIgniter;

function parseRating($jsn): array
{

	$ret = [
		'kp_votes' => NULL,
		'kp_rating' => NULL,
		'error_text' => '',
		'imdb_votes' => NULL,
		'imdb_rating' => NULL,
		'error' => false,
		'update' => 0
	];

	if ( $jsn ) {
		$data = json_decode($jsn, FALSE);
		if( is_object($data) ) {
			$ret = [
				'kp_votes' => $data->kp_votes,
				'kp_rating' => colorize_rating($data->kp_rating),
				'imdb_votes' => $data->imdb_votes,
				'imdb_rating' => $data->imdb_rating,
				'error' => $data->error,
				'error_text' => $data->error_text,
				'update' => $data->update,
			];
		}
	}

	return $ret;
}

function colorize_rating($rating): string
{
	if ( $rating == 0 ) {
		$col_rating = '<span style="color:gray;">-</span>';
	}
	else if ( $rating < 5 ) {
		$col_rating = '<span style="color:red;">' . $rating . '</span>';
	}
	else if ( $rating >= 5 && $rating < 7 ) {
		$col_rating = '<span style="color:#777;">' . $rating . '</span>';
	}
	else if ( $rating >= 7 ) {
		$col_rating = '<span style="color:#3bb33b;">' . $rating . '</span>';
	}
	else {
		$col_rating = $rating;
	}
	return $col_rating;
}

function my_col_bg($rating): string
{
	$bg_class = '';
	if ( $rating === 0 && is_int($rating) ) {
		$bg_class = 'bg_white';
	}
	else if ( $rating < 5 && is_int($rating) ) {
		$bg_class = 'bg_red';
	}
	else if ( ($rating >= 5 && $rating < 7) && is_int($rating) ) {
		$bg_class = 'bg_gray';
	}
	else if ( $rating >= 7 && is_int($rating) ) {
		$bg_class = 'bg_green';
	}
	else {
		$bg_class = 'bg_white';
	}
	return $bg_class;
}
