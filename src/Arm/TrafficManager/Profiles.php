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
 * @version     Release: 0.10.0_2016, API Version: 2015-11-01
 */

namespace MicrosoftAzure\Arm\TrafficManager;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Profiles.
 */
class Profiles
{
    /**
     * The service client object for the operations.
     *
     * @var TrafficManagerManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Profiles.
     *
     * @param TrafficManagerManagementClient, Service client for Profiles
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Checks the availability of a Traffic Manager Relative DNS name.
     *
     * @param array $parameters The Traffic Manager name parameters supplied to the
     *  CheckTrafficManagerNameAvailability operation. 
     * <pre>
     * [
     *    'name' => '',
     *    'type' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'name' => '',
     *    'type' => '',
     *    'nameAvailable' => 'false',
     *    'reason' => '',
     *    'message' => ''
     * ];
     * </pre>
     */
    public function checkTrafficManagerRelativeDnsNameAvailability(array $parameters, array $customHeaders = [])
    {
        $response = $this->checkTrafficManagerRelativeDnsNameAvailabilityAsync($parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Checks the availability of a Traffic Manager Relative DNS name.
     *
     * @param array $parameters The Traffic Manager name parameters supplied to the
     *  CheckTrafficManagerNameAvailability operation. 
     * <pre>
     * [
     *    'name' => '',
     *    'type' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function checkTrafficManagerRelativeDnsNameAvailabilityAsync(array $parameters, array $customHeaders = [])
    {
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/providers/Microsoft.Network/checkTrafficManagerNameAvailability';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * Lists all Traffic Manager profiles within a resource group.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profiles to be listed.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => ''
     * ];
     * </pre>
     */
    public function listAllInResourceGroup($resourceGroupName, array $customHeaders = [])
    {
        $response = $this->listAllInResourceGroupAsync($resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists all Traffic Manager profiles within a resource group.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profiles to be listed.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listAllInResourceGroupAsync($resourceGroupName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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
     * Lists all Traffic Manager profiles within a subscription.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => ''
     * ];
     * </pre>
     */
    public function listAll(array $customHeaders = [])
    {
        $response = $this->listAllAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists all Traffic Manager profiles within a subscription.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listAllAsync(array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Network/trafficmanagerprofiles';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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
     * Gets a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile.
     * @param string $profileName The name of the Traffic Manager profile.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $profileName, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $profileName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile.
     * @param string $profileName The name of the Traffic Manager profile.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $profileName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles/{profileName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{profileName}' => $profileName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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
     * Create or update a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile.
     * @param string $profileName The name of the Traffic Manager profile.
     * @param array $parameters The Traffic Manager profile parameters supplied to the CreateOrUpdate
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $profileName, array $parameters, array $customHeaders = [])
    {
        $response = $this->createOrUpdateAsync($resourceGroupName, $profileName, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create or update a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile.
     * @param string $profileName The name of the Traffic Manager profile.
     * @param array $parameters The Traffic Manager profile parameters supplied to the CreateOrUpdate
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createOrUpdateAsync($resourceGroupName, $profileName, array $parameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles/{profileName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{profileName}' => $profileName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * Deletes a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile to be deleted.
     * @param string $profileName The name of the Traffic Manager profile to be
     * deleted.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($resourceGroupName, $profileName, array $customHeaders = [])
    {
        $response = $this->deleteAsync($resourceGroupName, $profileName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Deletes a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile to be deleted.
     * @param string $profileName The name of the Traffic Manager profile to be
     * deleted.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($resourceGroupName, $profileName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles/{profileName}';
        $statusCodes = [200, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{profileName}' => $profileName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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
     * Update a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile.
     * @param string $profileName The name of the Traffic Manager profile.
     * @param array $parameters The Traffic Manager profile parameters supplied to the Update
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     */
    public function update($resourceGroupName, $profileName, array $parameters, array $customHeaders = [])
    {
        $response = $this->updateAsync($resourceGroupName, $profileName, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Update a Traffic Manager profile.
     *
     * @param string $resourceGroupName The name of the resource group containing
     * the Traffic Manager profile.
     * @param string $profileName The name of the Traffic Manager profile.
     * @param array $parameters The Traffic Manager profile parameters supplied to the Update
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'profileStatus' => '',
     *       'trafficRoutingMethod' => '',
     *       'dnsConfig' => [
     *          'relativeName' => '',
     *          'fqdn' => '',
     *          'ttl' => ''
     *       ],
     *       'monitorConfig' => [
     *          'profileMonitorStatus' => '',
     *          'protocol' => '',
     *          'port' => '',
     *          'path' => ''
     *       ],
     *       'endpoints' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function updateAsync($resourceGroupName, $profileName, array $parameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles/{profileName}';
        $statusCodes = [200];
        $method = 'PATCH';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{profileName}' => $profileName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
