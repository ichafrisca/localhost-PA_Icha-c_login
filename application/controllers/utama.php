<?php
class Utama extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> library('cart');
	}

	public function index() {
		$this -> load -> view('homeuser');
	}
}
?>