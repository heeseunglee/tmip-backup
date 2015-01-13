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

}