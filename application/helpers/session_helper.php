<?php
if (!function_exists('get_logged_user_id')) {
    function get_logged_user_id() {
        $CI =& get_instance();
        if ($CI->session->userdata('logged')) {
            $loggedUser = $CI->session->userdata('logged');
            
            if (is_array($loggedUser) && isset($loggedUser['id'])) {
                return $loggedUser['id'];
            } elseif (is_object($loggedUser) && isset($loggedUser->id)) {
                return $loggedUser->id;
            }
        }
        return null;
    }

    function get_logged_user_names() {
        $CI =& get_instance();
        if ($CI->session->userdata('logged')) {
            $loggedUser = $CI->session->userdata('logged');
            
            if (is_array($loggedUser) && isset($loggedUser['id'])) {
                return $loggedUser['fname'].' '.$loggedUser['lname'];
            } elseif (is_object($loggedUser) && isset($loggedUser->id)) {
                return $loggedUser->fname.' '.$loggedUser->lname;
            }
        }
        return null;
    }
}

?>