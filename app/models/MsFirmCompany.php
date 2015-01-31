<?php

class MsFirmCompany extends \Eloquent {
	protected $fillable = [ 'name',
							'postcode_1',
							'postcode_2',
							'address_1',
							'address_2',
							'applicant_name',
							'applicant_deputy',
							'applicant_position',
							'applicant_work_contact',
							'applicant_private_contact',
							'applicant_email',
							'heard_from',
							'reason',
							'additional_request'];

	protected $table = 'msFirm_companies';

	public function students() {
		return $this->hasMany('MsFirmStudent', 'msFirm_company_id');
	}

}