<?php


class Post
{
	private $postId;
	private $userId;
	private $postTitle;
	private $postDescription;
	private $slug;
	private $postedTime;
	private $userName;

	/**
	 * Post constructor.
	 * @param $postId
	 * @param $userId
	 * @param $postTitle
	 * @param $postDescription
	 * @param $slug
	 * @param $postedTime
	 */
	public function __construct($postId, $userId, $postTitle, $postDescription, $slug, $postedTime,$userName)
	{
		$this->postId = $postId;
		$this->userId = $userId;
		$this->postTitle = $postTitle;
		$this->postDescription = $postDescription;
		$this->slug = $slug;
		$this->postedTime = $postedTime;
		$this->userName=$userName;
	}

	/**
	 * @return mixed
	 */
	public function getPostId()
	{
		return $this->postId;
	}

	/**
	 * @param mixed $postId
	 */
	public function setPostId($postId)
	{
		$this->postId = $postId;
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
	public function getPostTitle()
	{
		return $this->postTitle;
	}

	/**
	 * @param mixed $postTitle
	 */
	public function setPostTitle($postTitle)
	{
		$this->postTitle = $postTitle;
	}

	/**
	 * @return mixed
	 */
	public function getPostDescription()
	{
		return $this->postDescription;
	}

	/**
	 * @param mixed $postDescription
	 */
	public function setPostDescription($postDescription)
	{
		$this->postDescription = $postDescription;
	}

	/**
	 * @return mixed
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param mixed $slug
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;
	}

	/**
	 * @return mixed
	 */
	public function getPostedTime()
	{
		return $this->postedTime;
	}

	/**
	 * @param mixed $postedTime
	 */
	public function setPostedTime($postedTime)
	{
		$this->postedTime = $postedTime;
	}

	/**
	 * @return mixed
	 */
	public function getUserName()
	{
		return $this->userName;
	}

	/**
	 * @param mixed $userName
	 */
	public function setUserName($userName)
	{
		$this->userName = $userName;
	}


}
