<?php

class Company extends \Eloquent {
	protected $fillable = [ 'name_kor',
							'name_eng',
							'address_kor',
							'address_eng',
							'contact_email',
							'contact_number_1',
							'contact_number_2' ];

	protected $table = 'companies';

	public function hrs() {
		return $this->hasMany('Hr', 'company_id');
	}

	public function courses() {
		return $this->hasMany('Course', 'company_id');
	}

	public function students() {
		return $this->hasMany('Student', 'company_id');
	}
}