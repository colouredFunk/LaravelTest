<?php

class Milestone extends Eloquent {


    public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $fillable = array('description, reportID');
    
	protected $table = 'milestones';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
