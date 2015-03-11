<?php
class FrontController extends BaseController
{
		public function __construct()
	{
		/*$this->beforeFilter('auth');*/
	}
	public function getIndex()
	{
		return 1;
	}
}
?>