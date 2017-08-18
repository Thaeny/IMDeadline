<?php

/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 13/07/17
 * Time: 14:20
 */


include_once "db.class.php";

class Courses
{
    private $m_sCoursename;


    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty)
        {
            case "Coursename":
                $this->m_sCoursename = $p_vValue;
                break;
        }
    }



    public function __get($p_sProperty)
    {
        $vResult = null;
        switch($p_sProperty)
        {
            case "Coursename":
                $vResult = $this->m_sCoursename;
        }
        return $vResult;
    }





    public function SaveCourse()
        /*
        De methode Save dient om een nieuwe COURSE te bewaren in onze databank.
        */
    {
        $db = Db::getInstance();

        $stmt = $db->prepare("INSERT INTO courses (coursename) VALUES (:coursename)");
        $stmt->bindValue(':coursename', $this->m_sCoursename, PDO::PARAM_STR);
        $stmt->execute();
        return $db->lastInsertId();

    }


    public function GetCourses()
    {
        $db = Db::getInstance();

        $stmt = $db->prepare("SELECT * FROM courses ");
        $stmt->execute();
        $rResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }




    public function DeleteCourse($id) {
        $value = $id;
        $conn = Db::getInstance();

        $stmt = $conn->prepare('DELETE FROM courses WHERE courseId = :courseId');
        $stmt->bindValue(":courseId", $value );
        $stmt->execute();
    }




}

