<?php



session_start();
spl_autoload_register(function ($class_name) {
    include '../classes/' .$class_name . '.class.php';
});

$comment = new Comment();

//controleer of er een update wordt verzonden
if(!empty($_POST['comment']))
{
    $comment->Comment = $_POST['comment'];
    $comment->TaskId = $_POST['id'];
    $comment->Username = $_POST['username'];
    try
    {
        $id = $comment->SaveComment();
        $response['id'] = $id;
        $response['status'] = 'succes';
        $response['message'] = 'Update succesvol';
    }
    catch (Exception $e)
    {
        $feedback = $e->getMessage();
        $response['status'] = "error";
        $response['message'] = $feedback;
    }
    header('Content-type: application/json');
    echo json_encode($response);
}