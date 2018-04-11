<?php
    require_once 'include/Functions.php';
    $db = new Functions();

    /**
     * @return json response    
     *
     * {
     *     "statusCode": 200,
     *     "statusMessage": "Success",
     *     "data": []
     * }
     */
    $response = array("statusCode" => RS_STATUS_CODE_SUCCESS, "statusMessage" => RS_STATUS_MESSAGE_SUCCESS, "data" => NULL);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user = $db->getUsers($id);
        if ($user != false) {
            $data["id"] = $user["id"];
            $data["name"] = $user["name"];
            $data["email"] = $user["email"];
            $data["phone"] = $user["phone"];

            $response["data"] = $data;
            echo json_encode($response);
        } else {
            $response["statusCode"] = RS_STATUS_CODE_FAIL;
            $response["statusMessage"] = RS_STATUS_MESSAGE_FAIL;
            echo json_encode($response);
        }
    } else {
        $response["statusCode"] = RS_STATUS_CODE_FAIL;
        $response["statusMessage"] = RS_STATUS_MESSAGE_FAIL;
        echo json_encode($response);
    }
?>