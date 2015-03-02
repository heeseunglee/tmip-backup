<?php

class LvlTestMcPoolIntermediate extends \Eloquent {
	protected $fillable = [ 'session',
                            'text',
                            'question',
                            'example_1',
                            'example_2',
                            'example_3',
                            'example_4',
                            'answer',
                            'question_2',
                            'example_5',
                            'example_6',
                            'example_7',
                            'example_8',
                            'answer_2' ];

    protected $table = 'lvl_test_mc_pool_intermediate';

    public $timestamps = false;
}

