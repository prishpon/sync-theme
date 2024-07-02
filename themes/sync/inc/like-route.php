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

function createLike($data){
    if(is_user_logged_in()){

        $professor = sanitize_text_field($data['professorId']);

        $existQuery= new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type'=>'like',
            'meta_query' => array(
               array(
                 'key'=>'liked_professor_id',
                 'compare' =>'=',
                 'value' => $professor
               )
             )
           ));

        if($existQuery->found_posts == 0 AND get_post_type($professor) == 'professor'){
            return wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => 'ID test',
                'meta_input' => array(
                    'liked_professor_id'=> $professor 
                )
            ));
        }else{
            die("You can like only once");
        } 
    }else{
       die("Only logged in users can create posts");
    }

   
}

function deleteLike(){
    return 'delete a like';
}