<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: 5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016, API Version: 2016-05-15
 */

namespace MicrosoftAzure\Arm\DevTestLabs;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * GalleryImageOperations for The DevTest Labs Client.
 */
class GalleryImageOperations
{
    /**
     * The service client object for the operations.
     *
     * @var DevTestLabsClient
     */
    private $_client;

    /**
     * Creates a new instance for GalleryImageOperations.
     *
     * @param DevTestLabsClient, Service client for GalleryImageOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * List gallery images in a given lab.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'author' => '',
     *       'createdDate' => '',
     *       'description' => '',
     *       'imageReference' => [
     *          'offer' => '',
     *          'publisher' => '',
     *          'sku' => '',
     *          'osType' => '',
     *          'version' => ''
     *       ],
     *       'icon' => '',
     *       'enabled' => 'false'
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param int $top The maximum number of resources to return from the
     * operation.
     * @param string $orderBy The ordering expression for the results, using OData
     * notation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listOperation($resourceGroupName, $labName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $labName, $filter, $top, $orderBy, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * List gallery images in a given lab.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'author' => '',
     *       'createdDate' => '',
     *       'description' => '',
     *       'imageReference' => [
     *          'offer' => '',
     *          'publisher' => '',
     *          'sku' => '',
     *          'osType' => '',
     *          'version' => ''
     *       ],
     *       'icon' => '',
     *       'enabled' => 'false'
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param int $top The maximum number of resources to return from the
     * operation.
     * @param string $orderBy The ordering expression for the results, using OData
     * notation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $labName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/galleryimages';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName]);
        $queryParams = ['$filter' => $filter, '$top' => $top, '$orderBy' => $orderBy, 'api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * List gallery images in a given lab.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * List gallery images in a given lab.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listNextAsync($nextPageLink, array $customHeaders = [])
    {
        if ($nextPageLink == null) {
            Validate::notNullOrEmpty($nextPageLink, '$nextPageLink');
        }

        $path = '{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = [];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }
}
