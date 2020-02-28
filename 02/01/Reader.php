<?php


class Reader
{
	private $file;

	public function __construct($file)
	{
		$this->file = fopen($file, r);
	}

	public function __destruct()
	{
		fclose($this->file);
	}

}