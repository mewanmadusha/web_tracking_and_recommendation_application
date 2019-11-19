<?php


class User
{
	private $userId;
	private $name;
	private $username;
	private $profilePictureUrl;
	private $password;

	/**
	 * User constructor.
	 * @param $userId
	 * @param $name
	 * @param $username
	 * @param $profilePictureUrl
	 * @param $password
	 */
	public function __construct($userId, $name, $username, $profilePictureUrl, $password)
	{
		$this->userId = $userId;
		$this->name = $name;
		$this->username = $username;
		$this->profilePictureUrl = $profilePictureUrl;
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->userId;
	}

	/**
	 * @param mixed $userId
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username)
	{
		$this->username = $username;
	}

	/**
	 * @return mixed
	 */
	public function getProfilePictureUrl()
	{
		return $this->profilePictureUrl;
	}

	/**
	 * @param mixed $profilePictureUrl
	 */
	public function setProfilePictureUrl($profilePictureUrl)
	{
		$this->profilePictureUrl = $profilePictureUrl;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}


}
