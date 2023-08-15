<?php
namespace inclued;
function sendResponse( $data, $message, $status = 200 ) {
    $response = [
        'status' => 1,
        'message' => $message,
        'data' => $data,
    ];

    return response()->json( $response, $status );
}

function sendError( $errorData, $message, $status = 500 ) {
    $response = [];
    $response['status'] = 0;
    $response[ 'message' ] = $message;
    if ( !empty( $errorData ) ) {
        $response[ 'data' ] = $errorData;
    }

    return response()->json( $response, $status );
}
