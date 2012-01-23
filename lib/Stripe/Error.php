<?php

class Stripe_Error extends Exception
{
	public function getType(){
		return $this->type;
	}
	public function getParam(){
		return $this->param;
	}
}
