<?php
    header('Access-Control-Allow-Origin: *');
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
        $object = $db->getObject($id);
        if ($object != false) {
            $data["id"] = $object["id"];
            $data["countryCode"] = $object["country_code"];
            $data["areaCode"] = $object["area_code"];
            $data["mobileNumber"] = $object["mobile_number"];

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