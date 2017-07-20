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
        }
        return $vResult;
    }





    public function SaveTask()
        /*
        De methode Save dient om een nieuwe LIST te bewaren in onze databank.
        */
    {

        $db = Db::getInstance();

        $stmt = $db->prepare("INSERT INTO tasks (taskname, username, deadline ) VALUES (:taskname, :username, :deadline)");
        $stmt->bindValue(':taskname', $this->m_sTaskname, PDO::PARAM_STR);
        $stmt->bindValue(":username",$_SESSION['user']);
        $stmt->bindValue(':deadline', $this->m_dDeadline, PDO::PARAM_STR);

        $stmt->execute();
        return $db->lastInsertId();

    }






}

