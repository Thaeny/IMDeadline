<?php

/**
 * Created by PhpStorm.
 * User: thomasthaens
 * Date: 13/07/17
 * Time: 14:20
 */


include_once "db.class.php";

class Lists
{
    private $m_iListId;
    private $m_sListname;
    private $m_sUsername;


    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty)
        {
            case "ListId":
                $this->m_iListId = $p_vValue;
                break;

            case "Listname":
                $this->m_sListname = $p_vValue;
                break;

            case "Username":
                $this->m_sUsername = $p_vValue;
                break;

        }
    }



    public function __get($p_sProperty)
    {
        $vResult = null;
        switch($p_sProperty)
        {
            case "ListId":
                $vResult = $this->m_iListId;

            case "Listname":
                $vResult = $this->m_sListname;
                break;

            case "Username":
                $vResult = $this->m_sUsername;
                break;
        }
        return $vResult;
    }





    public function SaveList()
        /*
        De methode Save dient om een nieuwe LIST te bewaren in onze databank.
        */
    {
        $db = Db::getInstance();

        $stmt = $db->prepare("INSERT INTO lists (listname, username) VALUES (:listname, :username)");
        $stmt->bindValue(':listname', $this->m_sListname, PDO::PARAM_STR);
        $stmt->bindValue(":username",$_SESSION['user']);
        $stmt->execute();
        return $db->lastInsertId();

    }


    public function GetLists()
    {
        $db = Db::getInstance();

        $stmt = $db->prepare("SELECT * FROM lists ");
        $stmt->execute();
        $rResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rResult;
    }






}

