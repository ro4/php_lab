<?php

abstract class FacadeAbs
{
	protected static function getFacadeAccessor()
	{
		echo 'Facade does not implement getFacadeAccessor method.';
		exit();
	}

	 protected static function resolveFacadeInstance()
	{
		$name = static::getFacadeAccessor();
		return (new $name);
	}

	public static function __callStatic($method, $args)
	{
		$instance = static::resolveFacadeInstance();
		return call_user_func_array([$instance, $method], $args);
	}
}
?>