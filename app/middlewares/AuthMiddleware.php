<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        $lava = lava_instance();

        if (!$lava->session->has_userdata('user_id')) {
            $lava->response->send_unauthorized('Authentication is required to access products.');
            return;
        }

        return $next();
    }
}
