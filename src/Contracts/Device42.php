<?php

namespace UMFlint\Device42\Contracts;

interface Device42
{
    /**
     * Make a get request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function get($endpoint, $options = []);

    /**
     * Make a post request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function post($endpoint, $options = []);

    /**
     * Make a put request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function put($endpoint, $options = []);

    /**
     * Make a delete request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function delete($endpoint, $options = []);

    /**
     * Make a patch request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function patch($endpoint, $options = []);

    /**
     * Make a head request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function head($endpoint, $options = []);

    /**
     * Make a options request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function options($endpoint, $options = []);
}