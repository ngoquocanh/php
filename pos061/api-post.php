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
    if (isset($_POST['countryCode']) && isset($_POST['areaCode']) && isset($_POST['mobileNumber'])) {
        $countryCode = $_POST['countryCode'];
        $areaCode = $_POST['areaCode'];
        $mobileNumber = $_POST['mobileNumber'];

        if ($db->isObjectExisted($mobileNumber)) {
            $response["statusCode"] = RS_STATUS_CODE_FAIL;
            $response["statusMessage"] = "Already existed with " . $mobileNumber;
            echo json_encode($response);
        } else {
            $object = $db->storeObject($countryCode, $areaCode, $mobileNumber);
            if ($object) {
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
        }
    } else {
        $response["statusCode"] = RS_STATUS_CODE_FAIL;
        $response["statusMessage"] = RS_STATUS_MESSAGE_FAIL;
        echo json_encode($response);
    }
?>