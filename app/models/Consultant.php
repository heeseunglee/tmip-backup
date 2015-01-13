<?php

class Consultant extends \Eloquent {
	protected $fillable = [ 'is_admin' ];

	protected $table = 'consultants';

	public function user() {
		return $this->morphOne('User', 'userable');
	}

	public function hrs() {
		return $this->hasMany('Hr', 'consultant_id');
	}

	public function getCompanies() {
		$all_hrs = $this->hrs;
		foreach($all_hrs as $hr) {
			$company_id_array[] = $hr->company->id;
		}
		$unique_sorted_array = array_flip(array_flip($company_id_array));
		return \Company::find($unique_sorted_array);
	}

	public function getHrsFromCompany($company_id) {
		return $this->hasMany('Hr', 'consultant_id')->where('company_id', $company_id)->get();
	}
}