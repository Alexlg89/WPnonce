<?php

namespace Alexlg89\WpNonce;

/**
 * Wrapper Class for Wordpress wp_nonce* functions
 *
 * Class WpNonce
 * @package Alexlg89\WpNonce
 * @version 0.0.1
 */
class WpNonce
{
    /**
     * Default nonce string
     */
    const DEFAULT_NONCE = '_wpnonce';

    /**
     * No construcor needed
     */
    private function __construct()
    {
        //
    }

    /**
     * Create a nonce url from a bare url.
     *
     * @see  https://codex.wordpress.org/Function_Reference/wp_nonce_url
     *
     * @param $bareUrl
     * @param $action
     * @param string $customNonce
     * @return bool|string
     */
    public static function url($bareUrl, $action, $customNonce = self::DEFAULT_NONCE)
    {
        if (!function_exists('wp_nonce_url')) {
            return false;
        }

        return wp_nonce_url($bareUrl, $action, $customNonce);
    }

    /**
     * Creates two hidden fields and returns the html.
     * One hidden field is for the nonce and the other one for the referer.
     *
     * @see  https://codex.wordpress.org/Function_Reference/wp_nonce_field
     *
     * @param $action
     * @param string $customNonce
     * @param bool $referer
     * @param bool $echo
     * @return bool
     */
    public static function field($action, $customNonce = self::DEFAULT_NONCE, $referer = true, $echo = true)
    {
        if (!function_exists('wp_nonce_field')) {
            return false;
        }

        return wp_nonce_field($action, $customNonce, $referer, $echo);
    }

    /**
     * Creates a nonce.
     *
     * @see  https://codex.wordpress.org/Function_Reference/wp_create_nonce
     *
     * @param $action
     * @return bool|string
     */
    public static function create($action)
    {
        if (!function_exists('wp_create_nonce')) {
            return false;
        }

        return wp_create_nonce($action);
    }

    /**
     * Checks the given url for a valid nonce.
     *
     * @see https://codex.wordpress.org/Function_Reference/check_admin_referer
     *
     * @param $action
     * @param string $customNonce
     * @return bool|false|int
     */
    public static function checkAdminReferer($action, $customNonce = self::DEFAULT_NONCE)
    {
        if (!function_exists('check_admin_referer')) {
            return false;
        }

        return check_admin_referer($action, $customNonce);
    }

    /**
     * Checks the given url for a valid nonce. If $die is true, it dies if the nonce is invalid.
     *
     * @see https://codex.wordpress.org/Function_Reference/check_ajax_referer
     *
     * @param $action
     * @param string $queryArg
     * @param bool $die
     * @return bool|false|int
     */
    public static function checkAjaxReferer($action, $queryArg = self::DEFAULT_NONCE, $die = true)
    {
        if (!function_exists('check_ajax_referer')) {
            return false;
        }

        return check_ajax_referer($action, $queryArg, $die);
    }

    /**
     * Verifies the nonce with a specific action.
     *
     * @see  https://codex.wordpress.org/Function_Reference/wp_verify_nonce
     *
     * @param $nonce
     * @param $action
     * @return bool|false|int
     */
    public static function verify($nonce, $action)
    {
        if (!function_exists('wp_verify_nonce') || empty($nonce) || !is_string($nonce)) {
            return false;
        }

        return wp_verify_nonce($nonce, $action);
    }
}
