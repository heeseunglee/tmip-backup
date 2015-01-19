<?php

class PreferAreaList extends \Eloquent {
	protected $fillable = ['prefer_area_group_id',
							'name'];

	protected $table = 'prefer_area_lists';

	public $timestamps = false;

	public function group() {
		return $this->belonsTo('PreferAreaGroup', 'prefer_area_group_id');
	}

	public function signUpForms() {
		return $this->belongsToMany('JobPoolSignUpForm',
									'jobpool_prefered_areas',
									'prefer_area_list_id',
									'jobpool_signup_form_id');
	}
}