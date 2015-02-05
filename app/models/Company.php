<?php

class Company extends \Eloquent {
	protected $fillable = [ 'name',
							'postcode_1',
							'postcode_2',
							'address_1',
							'address_2',
							'contact_email',
							'contact_number_1',
							'contact_number_2',
							'logo_image'];

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