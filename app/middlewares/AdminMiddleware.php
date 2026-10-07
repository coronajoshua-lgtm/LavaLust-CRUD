<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminMiddleware
{
    public function handle($next)
    {
        $lava = lava_instance();

        if (!$lava->session->has_userdata('user_id')) {
            $lava->response->send_unauthorized('Authentication is required to manage products.');
            return;
        }

        if ($lava->session->userdata('role') !== 'admin') {
            $lava->response->send_forbidden('Only administrators can manage products.');
            return;
        }

        return $next();
    }
}