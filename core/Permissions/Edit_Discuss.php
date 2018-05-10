<?php

namespace WeDevs\PM\Core\Permissions;

use WeDevs\PM\Core\Permissions\Abstract_Permission;
use WeDevs\PM\Discussion_Board\Models\Discussion_Board;
use WP_REST_Request;

class Edit_Discuss extends Abstract_Permission {
   
    public function check() {
        $id = $this->request->get_param( 'discussion_board_id' );
        $project_id = $this->request->get_param( 'project_id' );
        $user_id = get_current_user_id();

        if ( $user_id ) {

        	if ( $project_id && pm_is_manager( $project_id, $user_id ) ) {
	            return true;
	        }
	        if ( Discussion_Board::find( $id )->where( 'created_by', $user_id )->exists() ){
	        	return true;
	        }

        }

        return new \WP_Error( 'Discuss', __( "You have no permission.", "pm" ) );
    }
}