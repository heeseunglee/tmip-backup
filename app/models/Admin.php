<?php

class Admin extends \Eloquent {
	protected $fillable = [];

	protected $table = 'admins';

	public function user() {
		return $this->morphOne('User', 'userable');
	}
}