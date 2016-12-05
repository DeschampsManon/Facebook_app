<?php
class HomeController extends MyController {

	public function index() {
		self::loadTemplate('home.tpl', array());
	}
}
?>