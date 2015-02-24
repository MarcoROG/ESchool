<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 17:09
 */



namespace App\Users;


class Teacher extends User {
    use \TakesClasses , \MakesConferences;

    /**
     * Subjects taught by a teacher.
     * @access public
     * @relationship many-many
     * @return Subject[]
     */
    public function taughtSubjects(){
        return $this->belongsToMany(Subject::class,'classes_users','user','subject')->distinct('subject');
    }

    /**
     * Lessons held by the teacher.
     * @access public
     * @relationship one-many
     * @return Lesson[]
     */
    public function heldLessons(){
        return $this->hasMany(Lesson::class,'teacher');
    }


}