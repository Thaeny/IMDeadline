<?php



spl_autoload_register(function ($class_name) {
    include 'classes/' .$class_name . '.class.php';
});

class Comment
{
    private $m_iCommentId;
    private $m_sTaskId;
    private $m_sComment;
    private $m_sUsername;

    public function __set($p_sProperty, $p_vValue)
    {
        switch($p_sProperty)
        {
            case "CommentId":
                $this->m_iCommentId = $p_vValue;
                break;

            case "TaskId":
                $this->m_sTaskId = $p_vValue;
                break;

            case "Comment":
                $this->m_sComment = $p_vValue;
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
            case "CommentId":
                $vResult = $this->m_iCommentId;
                break;

            case "TaskId":
                $vResult = $this->m_sTaskId;
                break;

            case "Comment":
                $vResult = $this->m_sComment;
                break;

            case "Username":
                $vResult = $this->m_sUsername;
                break;
        }
        return $vResult;
    }


    public function SaveComment($id, $user)
        /*
        De methode Save dient om een nieuwe comment te bewaren in onze databank.
        */
    {


        $db = Db::getInstance();

        $stmt = $db->prepare("INSERT INTO comments (comment, taskId, username) VALUES (:comment, :taskId, :username)");
        $stmt->bindValue(':comment', $this->m_sComment, PDO::PARAM_STR);
        $stmt->bindValue(':taskId', $id);
        $stmt->bindValue(':username', $user);
        $stmt->execute();
        return $db->lastInsertId();

    }


    public function GetComments($taskID)
    {
        $db = Db::getInstance();

        $stmt = $db->query("SELECT * FROM comments WHERE taskId = $taskID");
        $stmt->execute();

        $rResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rResult;
    }

    public function RemoveComment() {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM comments WHERE commentId = :commentId");
        $stmt->bindValue(':commentId', $this->m_iCommentId, PDO::PARAM_INT);
        $stmt->execute();
    }








}
