<?php

class CourseSubType extends \Eloquent {
	protected $fillable = [ 'course_main_type_id',
							'name' ];

	protected $table = 'course_sub_types';

	public $timestamps = false;

	public function courseMainType() {
		return $this->belongsTo('CourseMainType', 'course_main_types');
	}
}