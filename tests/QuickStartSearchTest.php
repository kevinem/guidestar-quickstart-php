<?php


namespace KevinEm\GuideStar\Tests;

use GuzzleHttp\Client;
use KevinEm\GuideStar\QuickStartSearch;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class QuickStartSearchTest extends TestCase
{

    /**
     * @var m\Mock|Client
     */
    private $clientMock;

    /**
     * @var m\Mock|ResponseInterface
     */
    private $responseMock;

    /**
     * @var QuickStartSearch
     */
    private $quickStartSearch;

    /**
     * @var string
     */
    private $expectedUrl = 'https://quickstartdata.guidestar.org/v1/quickstartsearch.json';

    protected function setUp()
    {
        parent::setUp();
        $this->clientMock = m::mock(Client::class);
        $this->responseMock = m::mock(ResponseInterface::class);
        $this->quickStartSearch = new QuickStartSearch($this->clientMock, ['apiKey' => 'mock_api_key']);
        $this->responseMock->shouldReceive('getBody');
    }

    public function testBuildRequestUrl()
    {
        $this->assertEquals($this->expectedUrl, $this->quickStartSearch->buildRequestUrl());
    }

    public function testSearchEIN()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'ein:mock_ein'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchEIN('mock_ein');
    }

    public function testSearchZip()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'zip:mock_zip'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchZip('mock_zip');
    }

    public function testSearchKeyword()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'keyword:mock_keyword',
                    'p' => 2
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchKeyword('mock_keyword', ['p' => 2]);
    }

    public function testSearchOrganizationId()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'organization_id:mock_organization_id'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchOrganizationId('mock_organization_id');
    }

    public function testSearchOrganizationName()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'organization_name:mock_organization_name'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchOrganizationName('mock_organization_name');
    }

    public function testSearchCity()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'city:mock_city'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchCity('mock_city');
    }

    public function testSearchState()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'state:mock_state'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchState('mock_state');
    }

    public function testSearchParticipation()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'participation:mock_participation'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchParticipation('mock_participation');
    }

    public function testPublicReport()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => [
                    'q' => 'public_report:mock_public_report'
                ]
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->searchPublicReport('mock_public_report');
    }

    public function testSearch()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', $this->expectedUrl, [
                'auth' => ['mock_api_key', ''],
                'query' => []
            ])
            ->andReturn($this->responseMock);

        $this->quickStartSearch->search();
    }
}