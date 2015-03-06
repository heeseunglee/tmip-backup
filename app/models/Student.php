<?php

class Student extends \Eloquent {
	protected $fillable = [ 'company_id',
							'position',
							'deputy', ];

	protected $table = 'students';

	public function user() {
		return $this->morphOne('User', 'userable');
	}

	public function company() {
		return $this->belongsTo('Company', 'company_id');
	}

	public function preCourses() {
		return $this->belongsToMany('PreCourse',
									'students_attend_pre_courses',
									'student_id',
									'pre_course_id')
            ->withPivot('lvl_test_id',
                'lvl_test_status',
                'lvl_test_proceed_step',
                'lvl_test_started_at');
	}
}