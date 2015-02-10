<?php

class RequestedCourse extends \Eloquent {
	protected $fillable = [ 'hr_id',
							'company_id',
							'curriculum',
							'number_of_students',
							'course_type',
							'instructor_type',
							'instructor_gender',
							'instructor_career',
							'start_datetime',
							'end_datetime',
							'running_days',
							'location',
							'meeting_datetime',
							'other_requests',
							'is_confirmed',
							'confirmed_by' ];

	protected $table = 'requested_courses';

	public function company() {
		return $this->belongsTo('Company', 'company_id');
	}

	public function hr() {
		return $this->belongsTo('Hr', 'hr_id');
	}
}