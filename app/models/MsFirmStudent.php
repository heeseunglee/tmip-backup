<?php

class MsFirmStudent extends \Eloquent {
	protected $fillable = [ 'msFirm_company_id',
							'name',
							'deputy',
							'position',
							'email',
							'phone_number',
							'gender',
							'age',
							'city',
							'level' ];

	protected $table = 'msFirm_students';

	public function company() {
		return $this->belongsTo('MsFirmCompany', 'msFirm_company_id');
	}
}