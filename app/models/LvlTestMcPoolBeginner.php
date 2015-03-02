<?php

class LvlTestMcPoolBeginner extends \Eloquent {
	protected $fillable = [ 'session',
                            'question',
                            'example_1',
                            'example_2',
                            'example_3',
                            'answer' ];

    protected $table = 'lvl_test_mc_pool_beginner';

    public $timestamps = false;
}