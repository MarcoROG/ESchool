<?php namespace App\Repositories\Contracts;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 09/04/15
 * Time: 16:18
 */




interface IGenericCRUD {
    /**
     * Finds an object by his identifier(both hashed or not)
     * @param $identifier
     * @param $hash
     * @return mixed
     */
    public function find($identifier,$hash);

    /**
     * Creates an object with the given parameters.
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Updates the object data with an array of given parameters
     * @param $identifier
     * @param array $data
     * @return mixed
     */
    public function update($identifier,array $data);

    /**
     * Deletes the specified object
     * @param $identifier
     * @return mixed
     */
    public function delete($identifier);
}