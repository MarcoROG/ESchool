<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 17:09
 */



namespace App;


class Teacher extends User {
    use \TakesClasses

    /**
     * Subjects taught by a teacher.
     * @access public
     * @relationship many-many
     * @return Subject[]
     */
    public function subjects(){
        $this->hasMany('Subject','classes_users','user','subject')->distinct('subject');
    }

    /**
     * Lessons held by the teacher.
     * @access public
     * @relationship one-many
     * @return Lesson[]
     */
    public function lessons(){
        $this->hasMany('Lesson','teacher');
    }
}