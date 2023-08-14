<?php
namespace inclued;
function sendResponse( $data, $message, $status = 200 ) {
    $response = [
        'data' => $data,
        'message' => $message
    ];

    return response()->json( $response, $status );
}

function sendError( $errorData, $message, $status = 500 ) {
    $response = [];
    $response[ 'message' ] = $message;
    if ( !empty( $errorData ) ) {
        $response[ 'data' ] = $errorData;
    }

    return response()->json( $response, $status );
}
