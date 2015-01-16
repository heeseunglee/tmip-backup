<?php

class PreferAreaGroup extends \Eloquent {
	protected $fillable = ['name'];

	protected $table = 'prefer_area_groups';

	public $timestamps = false;

	public function lists() {
		return $this->hasMany('PreferAreaList', 'prefer_area_group_id');
	}
}