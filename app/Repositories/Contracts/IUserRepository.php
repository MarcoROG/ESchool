<?php namespace App\Repositories\Contracts;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 31/03/15
 * Time: 12:36
 */



interface IUserRepository {
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