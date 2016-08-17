<?php

namespace UMFlint\Device42;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use UMFlint\Device42\Contracts\Device42 as Device42Contract;

class Device42 implements Device42Contract
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Device42 constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Take a client response and decode the json.
     *
     * @param Response $response
     * @return mixed
     */
    protected function handleResponse(Response $response)
    {
        return \GuzzleHttp\json_decode($response->getBody(), true);
    }

    /**
     * Make a get request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function get($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->get($endpoint), $options);
    }

    /**
     * Make a post request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function post($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->post($endpoint), $options);
    }

    /**
     * Make a put request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function put($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->put($endpoint), $options);
    }

    /**
     * Make a delete request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function delete($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->delete($endpoint), $options);
    }

    /**
     * Make a patch request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function patch($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->patch($endpoint), $options);
    }

    /**
     * Make a head request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function head($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->head($endpoint), $options);
    }

    /**
     * Make a options request.
     *
     * @param       $endpoint
     * @param array $options
     * @return mixed
     */
    public function options($endpoint, $options = [])
    {
        return $this->handleResponse($this->client->options($endpoint), $options);
    }
}