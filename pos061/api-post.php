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
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if ($db->isUserExisted($email)) {
            $response["statusCode"] = RS_STATUS_CODE_FAIL;
            $response["statusMessage"] = "Already existed with " . $email;
            echo json_encode($response);
        } else {
            $user = $db->storeUser($name, $email, $phone);
            if ($user) {
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
        }
    } else {
        $response["statusCode"] = RS_STATUS_CODE_FAIL;
        $response["statusMessage"] = RS_STATUS_MESSAGE_FAIL;
        echo json_encode($response);
    }
?>