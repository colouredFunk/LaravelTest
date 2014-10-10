<?php

class Report extends Eloquent {


    public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $fillable = array('heading', 'status');
    
	protected $table = 'reports';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
