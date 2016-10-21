<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
		$this->load->dbforge();
	}
    public function index()
    {
        if ($this->migration->current() == FALSE)
        {
            show_error($this->migration->error_string());
        }
    }
    public function latest()
    {
    	$this->migration->latest();
    	echo $this->migration->error_string().PHP_EOL;
    }
    public function reset()
    {
    	$this->migration->version(0);
    	echo $this->migration->error_string().PHP_EOL;	
    }
    public function version($version = 0)
    {
    	$version = (int)$version;
    	if($version == 0){
    		die('You need to pass a version greater than zero.').PHP_EOL;
    	}
    	$this->migration->version($version);
    	echo $this->migration->error_string().PHP_EOL;	
    }
    public function current()
    {
    	$this->migration->current();
    	echo $this->migration->error_string().PHP_EOL;
    }
}