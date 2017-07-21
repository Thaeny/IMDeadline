<?php

/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 13/07/17
 * Time: 14:20
 */


include_once "db.class.php";

class Tasks
{
    private $m_iTaskId;
    private $m_sTaskname;
    private $m_sUsername;
    private $m_dDeadline;
    private $m_sCoursename;
    private $m_sListname;
    private $m_sInfo;




    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty)
        {
            case "TaskId":
                $this->m_iTaskId = $p_vValue;
                break;

            case "Taskname":
                $this->m_sTaskname = $p_vValue;
                break;

            case "Username":
                $this->m_sUsername = $p_vValue;
                break;

            case "Deadline":
                $this->m_dDeadline = $p_vValue;
                break;

            case "Listname":
                $this->m_sListname = $p_vValue;
                break;

            case "Coursename":
                $this->m_sCoursename = $p_vValue;
                break;

            case "Info":
                $this->m_sInfo = $p_vValue;
                break;
        }
    }



    public function __get($p_sProperty)
    {
        $vResult = null;
        switch($p_sProperty)
        {
            case "TaskId":
                $vResult = $this->m_iTaskId;

            case "Taskname":
                $vResult = $this->m_sTaskname;
                break;

            case "Username":
                $vResult = $this->m_sUsername;
                break;

            case "Deadline":
                $vResult = $this->m_dDeadline;
                break;

            case "Listname":
                $vResult = $this->m_sListname;
                break;

            case "Coursename":
                $vResult = $this->m_sCoursename;
                break;

            case "Info":
                $vResult = $this->m_sInfo;
                break;

        }
        return $vResult;
    }





    public function SaveTask()
        /*
        De methode Save dient om een nieuwe LIST te bewaren in onze databank.
        */
    {

        $db = Db::getInstance();

        $stmt = $db->prepare("INSERT INTO tasks (taskname, username, deadline, listname, coursename, info) VALUES (:taskname, :username, :deadline, :listname, :coursename, :info)");
        $stmt->bindValue(':taskname', $this->m_sTaskname, PDO::PARAM_STR);
        $stmt->bindValue(":username",$_SESSION['user']);
        $stmt->bindValue(':deadline', $this->m_dDeadline, PDO::PARAM_STR);
        $stmt->bindValue(':listname', $this->m_sListname, PDO::PARAM_STR);
        $stmt->bindValue(':coursename', $this->m_sCoursename, PDO::PARAM_STR);
        $stmt->bindValue(':info', $this->m_sInfo, PDO::PARAM_STR);

        $stmt->execute();
        return $db->lastInsertId();

    }






}

