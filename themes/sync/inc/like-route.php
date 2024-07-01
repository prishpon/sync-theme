<?php 

add_action( 'rest_api_init', 'syncLikeRoutes');

function syncLikeRoutes(){
    register_rest_route( 'sync/v1', 'manageLike', array(
         'methods'=>'POST',
         'callback'=>'createLike'
    ));

    register_rest_route( 'sync/v1', 'manageLike', array(
        'methods'=>'DELETE',
        'callback'=>'deleteLike'
   ));
}

function createLike(){
    return 'create a like';
}

function deleteLike(){
    return 'delete a like';
}