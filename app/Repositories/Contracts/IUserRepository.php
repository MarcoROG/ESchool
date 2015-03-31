<?php namespace App\Repositories\Contracts;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 31/03/15
 * Time: 12:36
 */



interface IUserRepository {
    /**
     * Finds an user by his identifier(both hashed or not)
     * @param $identifier
     * @return mixed
     */
    public function find($identifier);

    /**
     * Returns all the approved users
     * @return mixed
     */
    public function allApproved();

    /**
     * Returns all the unapproved users
     * @return mixed
     */
    public function allUnapproved();


    /**
     * Updates the user data with an array of given parameters
     * @param $identifier
     * @param array $data
     * @return mixed
     */
    public function update($identifier,array $data);

    /**
     * Creates an user with the given parameters.
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Verifies and logs in an user
     * @param $hash
     * @return mixed
     */
    public function verifyAndAuth($hash);

    /**
     * Sets if an user is either approved or refused
     * @param $hash
     * @param $value
     * @return mixed
     */
    public function approve($hash,$value);
}