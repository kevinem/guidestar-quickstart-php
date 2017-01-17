<?php


namespace KevinEm\GuideStar\Tests;

use GuzzleHttp\Client;
use KevinEm\GuideStar\QuickStartDetail;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class QuickStartDetailTest extends TestCase
{

    /**
     * @var QuickStartDetail
     */
    private $quickStartDetail;

    /**
     * @var m\Mock|Client
     */
    private $clientMock;

    /**
     * @var m\Mock|ResponseInterface
     */
    private $responseMock;

    /**
     * @var string
     */
    private $organizationId = 'mock_organization_id';

    protected function setUp()
    {
        parent::setUp();
        $this->clientMock = m::mock(Client::class);
        $this->responseMock = m::mock(ResponseInterface::class);
        $this->quickStartDetail = new QuickStartDetail($this->clientMock, ['apiKey' => 'mock_api_key']);
        $this->responseMock->shouldReceive('getBody');
    }

    public function testBuildRequestUrl()
    {
        $this->assertEquals("https://quickstartdata.guidestar.org/v1/quickstartdetail/$this->organizationId.json", $this->quickStartDetail->buildRequestUrl($this->organizationId));
    }

    public function testGetOrganizationDetail()
    {
        $this->clientMock->shouldReceive('request')
            ->with('GET', "https://quickstartdata.guidestar.org/v1/quickstartdetail/$this->organizationId.json", [
                'auth' => ['mock_api_key', '']
            ])
            ->andReturn($this->responseMock);

        $this->quickStartDetail->getOrganizationDetail($this->organizationId);
    }
}