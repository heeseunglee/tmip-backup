<?php

class Hr extends \Eloquent {
	protected $fillable = [ 'company_id',
							'consultant_id', ];

	protected $table = 'hrs';

	public function user() {
		return $this->morphOne('User', 'userable');
	}
}