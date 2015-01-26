<?php

class Instructor extends \Eloquent {
	protected $fillable = [ 'name_chn',
							'rating',
							'career_years',
							'end_of_contract_date',
							'date_of_birth',
							'residence_number',
							'bank_id',
							'bank_account_number',
							'payday',
							'gender',
							'age' ];

	protected $table = 'instructors';

	public function user() {
		return $this->morphOne('User', 'userable');
	}

	public function availableTimes() {
		return $this->hasMany('InstructorsAvailableTime', 'instructor_id');
	}

	public function preferredAreas() {
		return $this->hasMany('InstructorsPreferredArea', 'instructor_id');
	}
}