<?php

class Bank extends \Eloquent {
	protected $fillable = ['name'];

	protected $table = "banks";

	public $timestamps = false;
}