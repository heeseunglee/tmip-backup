<?php

class InstructorsPreferredArea extends \Eloquent {
	protected $fillable = [ 'instructor_id',
							'preferred_area_id' ];

	protected $table = 'instructors_preferred_areas';

	public $timestamps = false;
}