<?php

class PreCourse extends \Eloquent {
	protected $fillable = [ 'requested_course_id',
							'hr_id',
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
							'level_test',
							'meeting_datetime',
							'other_requests',
							'status',
                            'close_date' ];

	protected $table = 'pre_courses';

	public function hr() {
		return $this->belongsTo('Hr', 'hr_id');
	}

	public function company() {
		return $this->belongsTo('Company', 'company_id');
	}

	public function students() {
		return $this->belongsToMany('Student',
									'students_attend_pre_courses',
									'pre_course_id',
									'student_id');
	}
}