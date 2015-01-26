<?php

class InstructorsAvailableTime extends \Eloquent {
	protected $fillable = [ 'instructor_id',
							'available_time_start',
							'available_time_end' ];

	protected $table = 'instructors_available_times';

	public $timestamps = false;
}