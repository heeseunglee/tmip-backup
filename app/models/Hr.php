<?php

class Hr extends \Eloquent {
	protected $fillable = [ 'company_id',
							'consultant_id', ];

	protected $table = 'hrs';

	public function user() {
		return $this->morphOne('User', 'userable');
	}

	public function consultant() {
		return $this->belongsTo('Consultant', 'consultant_id');
	}

	public function company() {
		return $this->belongsTo('Company', 'company_id');
	}
}