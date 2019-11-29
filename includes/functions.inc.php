<?php
	if(!session_start()) session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);

	/**
	 * @Function name  : connection
	 * @Description    : to connection with the mysql database
	 * @Parameters     : none
	 *
	 * @Method         :
	 * @Returns        : connection object
	 * @Return type    : object
	 */
	function connection()
	{
		
		$connection=mysqli_connect('localhost','root','','userregistration');
		if(!$connection)
		{
			exit('Database connection error');
		}

		return $connection;
	}

	/**
	 * @Function name  : clear
	 * @Description    : clear the given value
	 * @Parameters     : $string
	 *
	 * @Method         :
	 * @Returns        : string
	 * @Return type    : string
	 */
	function clear($string = null)
	{
		return stripslashes(str_replace("'", "`", $string));
	}
?>