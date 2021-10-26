<?php 
namespace App\Services;

class MainServices
{
	static public function generateRandomString()
	{
		return uniqid().time().uniqid();
	}
}