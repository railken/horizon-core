<?php

namespace Core\User;

use Core\User\User;

class UserRepository
{
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

	/**
	 * Find by primary
	 *
	 * @param integer $id
	 *
	 * @return User
	 */
	public function find($id)
	{
		return User::where('id',$id)->first();
	}

	/**
	 * Find where in
	 *
	 * @param array
	 *
	 * @return Collection
	 */
	public function findWhereIn($params)
	{
		$q = $this->getQuery();

		foreach ($params as $name => $value) {
			$q->whereIn($name, $value);
		}

		return $q->get();
	}

	/**
	 * Return query
	 *
	 * @return QueryBuilder
	 */
	public function getQuery()
	{
		$user = new User();
		return $user->newQuery();
	}
}
