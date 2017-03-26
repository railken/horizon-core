<?php

namespace Core\User;

use Core\User\User;

use Railken\Laravel\Manager\ModelRepository;

class UserRepository extends ModelRepository
{

	/**
	 * Entity
	 *
	 * @var string
	 */
	public $entity = User::class;

	/**
	 * Find an user given email
	 *
	 * @param string $email
	 *
	 * @return User
	 */
	public function uniqueByEmail(User $user, $email)
	{
		return $this->getQuery()->whereEmail($email)->where('id', '!=', $user->id)->first();
	}

	/**
	 * Find an user given username
	 *
	 * @param string $username
	 *
	 * @return User
	 */
	public function uniqueByUsername(User $user, $username)
	{
		return $this->getQuery()->whereUsername($username)->where('id', '!=', $user->id)->first();
	}

	/**
	 * Find an user given email
	 *
	 * @param string $email
	 *
	 * @return User
	 */
	public function findByEmail($email)
	{
		return $this->getQuery()->whereEmail($email)->first();
	}

	/**
	 * Find an user given username
	 *
	 * @param string $username
	 *
	 * @return User
	 */
	public function findByUsername($username)
	{
		return $this->getQuery()->whereUsername($username)->first();
	}

}
