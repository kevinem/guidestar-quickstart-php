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

    protected $username;

    protected $password;

    /**
     * Client constructor.
     * @param Client $client
     * @param array $config
     * @throws \Exception
     */
    public function __construct(Client $client, array $config)
    {
        $this->client = $client;
        $this->apiKey = isset($config['apiKey']) ? $config['apiKey'] : null;
        $this->username = isset($config['username']) ? $config['username'] : null;
        $this->password = isset($config['password']) ? $config['password'] : null;

        if (!isset($this->apiKey) && !(isset($this->username) && isset($this->password))) {
            throw new \Exception('Either apiKey or username and password is needed');
        }
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
        return isset($this->apiKey) ? ['auth' => [$this->apiKey, '']] : ['auth' => [$this->username, $this->password]];
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