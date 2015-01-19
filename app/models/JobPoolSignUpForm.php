<?php

class JobPoolSignUpForm extends \Eloquent {
	protected $fillable = [ 'name_kor',
							'name_eng',
							'name_chn',
							'email',
							'phone_number',
							'date_of_birth',
							'gender',
							'visa_type',
							'postcode_1',
							'postcode_2',
							'address_1',
							'address_2',
							'academic_background',
							'name_of_last_school',
							'major',
							'study_aboard_background',
							'career_years',
							'available_time_morning_start',
							'available_time_morning_end',
							'available_time_afternoon_start',
							'available_time_afternoon_end',
							'available_time_night_start',
							'available_time_night_end',
							'resume',
							'profile_image'];

	protected $table = 'jobpool_signup_forms';

	public function careerDetails() {
		return $this->hasMany('JobPoolCareerDetail', 'jobpool_signup_form_id');
	}

	public function preferedAreas() {
		return $this->belongsToMany('PreferAreaList',
									'jobpool_prefered_areas',
									'jobpool_signup_form_id',
									'prefer_area_list_id');
	}
}
