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
 * @version     Release: 0.10.0_2016, API Version: 2015-08-01-preview
 */

namespace MicrosoftAzure\Arm\Logic;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * IntegrationAccountAgreements.
 */
class IntegrationAccountAgreements
{
    /**
     * The service client object for the operations.
     *
     * @var LogicManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for IntegrationAccountAgreements.
     *
     * @param LogicManagementClient, Service client for IntegrationAccountAgreements
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Gets a list of integration account agreements.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param int $top The number of items to be included in the result.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'agreementType' => 'NotSpecified|AS2|X12|Edifact'
     * ];
     * </pre>
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
    public function listOperation($resourceGroupName, $integrationAccountName, $top = null, array $filter, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $integrationAccountName, $top, $filter, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a list of integration account agreements.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param int $top The number of items to be included in the result.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'agreementType' => 'NotSpecified|AS2|X12|Edifact'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $integrationAccountName, $top = null, array $filter, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($integrationAccountName == null) {
            Validate::notNullOrEmpty($integrationAccountName, '$integrationAccountName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/agreements';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{integrationAccountName}' => $integrationAccountName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion(), '$top' => $top, '$filter' => $filter];
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
     * Gets an integration account agreement.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param string $agreementName The integration account agreement name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'createdTime' => '',
     *       'changedTime' => '',
     *       'metadata' => '',
     *       'agreementType' => 'NotSpecified|AS2|X12|Edifact',
     *       'hostPartner' => '',
     *       'guestPartner' => '',
     *       'hostIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'guestIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'content' => [
     *          'AS2' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'X12' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'Edifact' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $integrationAccountName, $agreementName, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $integrationAccountName, $agreementName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets an integration account agreement.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param string $agreementName The integration account agreement name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $integrationAccountName, $agreementName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($integrationAccountName == null) {
            Validate::notNullOrEmpty($integrationAccountName, '$integrationAccountName');
        }
        if ($agreementName == null) {
            Validate::notNullOrEmpty($agreementName, '$agreementName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/agreements/{agreementName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{integrationAccountName}' => $integrationAccountName, '{agreementName}' => $agreementName]);
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
     * Creates or updates an integration account agreement.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param string $agreementName The integration account agreement name.
     * @param array $agreement The integration account agreement. 
     * <pre>
     * [
     *    'properties' => [
     *       'createdTime' => '',
     *       'changedTime' => '',
     *       'metadata' => '',
     *       'agreementType' => 'NotSpecified|AS2|X12|Edifact',
     *       'hostPartner' => '',
     *       'guestPartner' => '',
     *       'hostIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'guestIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'content' => [
     *          'AS2' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'X12' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'Edifact' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ]
     *       ]
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
     *       'createdTime' => '',
     *       'changedTime' => '',
     *       'metadata' => '',
     *       'agreementType' => 'NotSpecified|AS2|X12|Edifact',
     *       'hostPartner' => '',
     *       'guestPartner' => '',
     *       'hostIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'guestIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'content' => [
     *          'AS2' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'X12' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'Edifact' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'createdTime' => '',
     *       'changedTime' => '',
     *       'metadata' => '',
     *       'agreementType' => 'NotSpecified|AS2|X12|Edifact',
     *       'hostPartner' => '',
     *       'guestPartner' => '',
     *       'hostIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'guestIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'content' => [
     *          'AS2' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'X12' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'Edifact' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $integrationAccountName, $agreementName, array $agreement, array $customHeaders = [])
    {
        $response = $this->createOrUpdateAsync($resourceGroupName, $integrationAccountName, $agreementName, $agreement, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates or updates an integration account agreement.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param string $agreementName The integration account agreement name.
     * @param array $agreement The integration account agreement. 
     * <pre>
     * [
     *    'properties' => [
     *       'createdTime' => '',
     *       'changedTime' => '',
     *       'metadata' => '',
     *       'agreementType' => 'NotSpecified|AS2|X12|Edifact',
     *       'hostPartner' => '',
     *       'guestPartner' => '',
     *       'hostIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'guestIdentity' => [
     *          'Qualifier' => '',
     *          'Value' => ''
     *       ],
     *       'content' => [
     *          'AS2' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'X12' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ],
     *          'Edifact' => [
     *             'receiveAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ],
     *             'sendAgreement' => [
     *                'senderBusinessIdentity' => ,
     *                'receiverBusinessIdentity' => ,
     *                'protocolSettings' => 
     *             ]
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createOrUpdateAsync($resourceGroupName, $integrationAccountName, $agreementName, array $agreement, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($integrationAccountName == null) {
            Validate::notNullOrEmpty($integrationAccountName, '$integrationAccountName');
        }
        if ($agreementName == null) {
            Validate::notNullOrEmpty($agreementName, '$agreementName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($agreement == null) {
            Validate::notNullOrEmpty($agreement, '$agreement');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/agreements/{agreementName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{integrationAccountName}' => $integrationAccountName, '{agreementName}' => $agreementName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($agreement);

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
     * Deletes an integration account agreement.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param string $agreementName The integration account agreement name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($resourceGroupName, $integrationAccountName, $agreementName, array $customHeaders = [])
    {
        $response = $this->deleteAsync($resourceGroupName, $integrationAccountName, $agreementName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Deletes an integration account agreement.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $integrationAccountName The integration account name.
     * @param string $agreementName The integration account agreement name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($resourceGroupName, $integrationAccountName, $agreementName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($integrationAccountName == null) {
            Validate::notNullOrEmpty($integrationAccountName, '$integrationAccountName');
        }
        if ($agreementName == null) {
            Validate::notNullOrEmpty($agreementName, '$agreementName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/agreements/{agreementName}';
        $statusCodes = [200, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{integrationAccountName}' => $integrationAccountName, '{agreementName}' => $agreementName]);
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
     * Gets a list of integration account agreements.
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
     * Gets a list of integration account agreements.
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
