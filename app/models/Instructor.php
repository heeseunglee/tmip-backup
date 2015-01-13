<?php

class Instructor extends \Eloquent {
	protected $fillable = [ 'name_chn',
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
}