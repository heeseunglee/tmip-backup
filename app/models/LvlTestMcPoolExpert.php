<?php

class LvlTestMcPoolExpert extends \Eloquent {
    protected $fillable = [ 'session',
                            'text',
                            'question',
                            'example_1',
                            'example_2',
                            'example_3',
                            'example_4',
                            'answer'];

    protected $table = 'lvl_test_mc_pool_expert';

    public $timestamps = false;
}