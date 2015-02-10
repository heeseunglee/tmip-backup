<?php

class CourseMainType extends \Eloquent {
	protected $fillable = [ 'name',
							'can_select_multiple' ];

	protected $table = 'course_main_types';

	public $timestamps = false;

	public function courseSubTypes() {
		return $this->hasMany('CourseSubType', 'course_main_type_id');
	}
}