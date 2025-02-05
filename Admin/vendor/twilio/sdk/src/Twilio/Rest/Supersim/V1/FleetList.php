<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Supersim
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Supersim\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class FleetList extends ListResource
    {
    /**
     * Construct the FleetList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(
        Version $version
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        ];

        $this->uri = '/Fleets';
    }

    /**
     * Create the FleetInstance
     *
     * @param string $networkAccessProfile The SID or unique name of the Network Access Profile that will control which cellular networks the Fleet's SIMs can connect to.
     * @param array|Options $options Optional Arguments
     * @return FleetInstance Created FleetInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $networkAccessProfile, array $options = []): FleetInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'NetworkAccessProfile' =>
                $networkAccessProfile,
            'UniqueName' =>
                $options['uniqueName'],
            'DataEnabled' =>
                Serialize::booleanToString($options['dataEnabled']),
            'DataLimit' =>
                $options['dataLimit'],
            'IpCommandsUrl' =>
                $options['ipCommandsUrl'],
            'IpCommandsMethod' =>
                $options['ipCommandsMethod'],
            'SmsCommandsEnabled' =>
                Serialize::booleanToString($options['smsCommandsEnabled']),
            'SmsCommandsUrl' =>
                $options['smsCommandsUrl'],
            'SmsCommandsMethod' =>
                $options['smsCommandsMethod'],
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new FleetInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Reads FleetInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return FleetInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Streams FleetInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of FleetInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return FleetPage Page of FleetInstance
     */
    public function page(
        array $options = [],
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): FleetPage
    {
        $options = new Values($options);

        $params = Values::of([
            'NetworkAccessProfile' =>
                $options['networkAccessProfile'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new FleetPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of FleetInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return FleetPage Page of FleetInstance
     */
    public function getPage(string $targetUrl): FleetPage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new FleetPage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a FleetContext
     *
     * @param string $sid The SID of the Fleet resource to fetch.
     */
    public function getContext(
        string $sid
        
    ): FleetContext
    {
        return new FleetContext(
            $this->version,
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Supersim.V1.FleetList]';
    }
}
