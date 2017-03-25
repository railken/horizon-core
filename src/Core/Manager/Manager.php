<?php

namespace Core\Manager;

use Core\Manager\ManagerEntityContract;

use Exception;


abstract class Manager
{


	/**
	 * Entity class
	 *
	 * @var string
	 */
	protected $entity;

	/**
	 * Construct
	 *
	 */
	public function __construct()
	{

	}

	/**
	 * Retrieve repository
	 *
	 * @return Symfony\ORM\Repository
	 */
	abstract public function getRepository();

	/**
	 * Find
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function find($params)
	{
		return $this->getRepository()->find($params);
	}

	/**
	 * Find where in
	 *
	 * @param array $params
	 *
	 * @return Collection ?
	 */
	public function findWhereIn(array $params)
	{
		return $this->getRepository()->findWhereIn($params);
	}

	/**
	 * Create a new ManagerEntityContract given array
	 *
	 * @param array $params
	 *
	 * @return Core\Manager\ManagerEntityContract
	 */
	public function create(array $params)
	{

		$entity = $this->entity;
		$entity = new $entity();
		$this->update($entity, $params);
		$this->save($entity);

		return $entity;
	}

	/**
	 * Update a ManagerEntityContract given array
	 *
	 * @param array $params
	 *
	 * @return Core\Manager\ManagerEntityContract
	 */
	public function update(ManagerEntityContract $entity, array $params)
	{

		$this->fill($entity, $params);
		$this->save($entity);

		return $entity;
	}

	/**
	 * Fill entity ManagerEntityContract with array
	 *
	 * @param Core\Manager\ManagerEntityContract $entity
	 * @param array $params
	 *
	 * @return void
	 */
	abstract public function fill(ManagerEntityContract $entity, array $params);

	/**
	 * Convert entity to array
	 *
	 * @param  Core\Manager\ManagerEntityContract $entity
	 *
	 * @return array
	 */
	abstract public function toArray(ManagerEntityContract $entity);


	/**
	 * Remove multiple ManagerEntityContract
	 *
	 * @param array $entities
	 *
	 * @return void
	 */
	public function deleteMultiple($entities)
	{
		foreach ($entities as $entity) {
			$this->delete($entity);
		}
	}

	/**
	 * Remove a ManagerEntityContract
	 *
	 * @param Core\Manager\ManagerEntityContract $entity
	 *
	 * @return void
	 */
	public function delete(ManagerEntityContract $entity)
	{
		$entity->delete();
	}

	/**
	 * Save the entity
	 *
	 * @param  Core\Manager\ManagerEntityContract $entity
	 *
	 * @return ManagerEntityContract
	 */
	 public function save(ManagerEntityContract $entity)
	 {
		 $entity->save();
	 }

}
