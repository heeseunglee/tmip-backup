<?php

class JobPoolCareerDetail extends \Eloquent {
	protected $fillable = [ 'jobpool_signup_form_id',
							'career_detail_company_name',
							'career_detail_type',
							'career_detail_description',
							'career_detail_period' ];

	protected $table = 'jobpool_career_details';

	public function signUp() {
		return $this->belongsTo('JobPoolSignUpForm', 'jobpool_signup_form_id');
	}

	public $timestamps = false;
}