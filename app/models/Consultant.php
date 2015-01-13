<?php

class Consultant extends \Eloquent {
	protected $fillable = [ 'is_admin' ];

	protected $table = 'consultants';

	public function user() {
		return $this->morphOne('User', 'userable');
	}
}