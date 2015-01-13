<?php

class Student extends \Eloquent {
	protected $fillable = [ 'company_id',
							'position',
							'deputy', ];

	protected $table = 'students';

	public function user() {
		return $this->morphOne('User', 'userable');
	}
}