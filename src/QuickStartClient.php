<?php


namespace KevinEm\GuideStar;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class QuickStartClient
{

    private $client;

    protected $baseUrl = 'https://quickstartdata.guidestar.org';

    protected $version = 'v1';

    protected $responseType = 'json';

    protected $apiKey;

    /**
     * Client constructor.
     * @param array $config
     * @param Client $client
     */
    public function __construct(Client $client, array $config)
    {
        $this->apiKey = $config['apiKey'];
        $this->client = $client;
    }

    /**
     * @return string
     */
    protected function buildBaseUrl()
    {
        return "$this->baseUrl/$this->version";
    }

    /**
     * @return array
     */
    protected function buildAuth()
    {
        return ['auth' => [$this->apiKey, '']];
    }

    /**
     * @param array $options
     * @return array
     */
    protected function buildRequestOptions(array $options = [])
    {
        return array_merge($this->buildAuth(), $options);
    }

    /**
     * @param array $query
     * @return array
     */
    protected function buildQuery(array $query)
    {
        return compact('query');
    }

    /**
     * @param $url
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function request($url, array $options = [])
    {
        return $this->client->request('GET', $url, $options);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response)
    {
        return json_decode($response->getBody());
    }
}