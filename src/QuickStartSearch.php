<?php


namespace KevinEm\GuideStar;


use Psr\Http\Message\ResponseInterface;

class QuickStartSearch extends QuickStartClient
{

    /**
     * @return string
     */
    public function buildRequestUrl()
    {
        return $this->buildBaseUrl() . "/quickstartsearch.$this->responseType";
    }

    /**
     * @param $ein
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchEIN($ein, array $options = [])
    {
        return $this->search(array_merge(['q' => "ein:$ein"], $options));
    }

    /**
     * @param $zip
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchZip($zip, array $options = [])
    {
        return $this->search(array_merge(['q' => "zip:$zip"], $options));
    }

    /**
     * @param $keyword
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchKeyword($keyword, array $options = [])
    {
        return $this->search(array_merge(['q' => "keyword:$keyword"], $options));
    }

    /**
     * @param $organizationId
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchOrganizationId($organizationId, array $options = [])
    {
        return $this->search(array_merge(['q' => "organization_id:$organizationId"], $options));
    }

    /**
     * @param $organizationName
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchOrganizationName($organizationName, array $options = [])
    {
        return $this->search(array_merge(['q' => "organization_name:$organizationName"], $options));
    }

    /**
     * @param $city
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchCity($city, array $options = [])
    {
        return $this->search(array_merge(['q' => "city:$city"], $options));
    }

    /**
     * @param $state
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchState($state, array $options = [])
    {
        return $this->search(array_merge(['q' => "state:$state"], $options));
    }

    /**
     * @param $participation
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchParticipation($participation, array $options = [])
    {
        return $this->search(array_merge(['q' => "participation:$participation"], $options));
    }

    /**
     * @param $publicReport
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function searchPublicReport($publicReport, array $options = [])
    {
        return $this->search(array_merge(['q' => "public_report:$publicReport"], $options));
    }

    /**
     * @param array $query
     * @return mixed|ResponseInterface
     */
    public function search(array $query = [])
    {
        return $this->parseResponse($this->request($this->buildRequestUrl(), $this->buildRequestOptions($this->buildQuery($query))));
    }
}