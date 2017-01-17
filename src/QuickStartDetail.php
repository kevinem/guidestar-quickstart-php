<?php


namespace KevinEm\GuideStar;


class QuickStartDetail extends QuickStartClient
{

    public function buildRequestUrl($organizationId)
    {
        return $this->buildBaseUrl() . "/quickstartdetail/$organizationId.$this->responseType";
    }

    public function getOrganizationDetail($organizationId)
    {
        return $this->parseResponse($this->request($this->buildRequestUrl($organizationId), $this->buildRequestOptions()));
    }
}