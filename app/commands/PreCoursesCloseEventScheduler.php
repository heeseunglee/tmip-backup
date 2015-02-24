<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PreCoursesCloseEventScheduler extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'trinity:preCoursesCloseEventScheduler';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'closes pre courses every night';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler
            ->daily()
            ->hours(18)
            ->minutes(0);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$pre_courses = \PreCourse::where('close_date', date_format(new DateTime(), 'Y-m-d'))->get();
        if (!is_null($pre_courses)) {
            foreach($pre_courses as $pre_course) {
                $pre_course->status = '완료';
            }
        }
	}

}
