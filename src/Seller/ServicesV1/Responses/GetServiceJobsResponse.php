<?php

namespace SellingPartnerApi\Seller\ServicesV1\Responses;

use Crescat\SaloonSdkGenerator\BaseResponse;
use SellingPartnerApi\Seller\ServicesV1\Dto\Error;
use SellingPartnerApi\Seller\ServicesV1\Dto\JobListing;

final class GetServiceJobsResponse extends BaseResponse
{
    protected static array $complexArrayTypes = ['errors' => [Error::class]];

    /**
     * @param  ?JobListing  $payload The payload for the `getServiceJobs` operation.
     * @param  Error[]|null  $errors A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?JobListing $payload = null,
        public readonly ?array $errors = null,
    ) {
    }
}
