<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
    }
	
	function index(){
		$this->load->view('admin/panels');
    }
}
