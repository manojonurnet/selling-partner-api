<?php

namespace SellingPartnerApi\Seller\FBAInboundV0\Responses;

use Crescat\SaloonSdkGenerator\BaseResponse;
use SellingPartnerApi\Seller\FBAInboundV0\Dto\Error;
use SellingPartnerApi\Seller\FBAInboundV0\Dto\GetShipmentItemsResult;

final class GetShipmentItemsResponse extends BaseResponse
{
    protected static array $complexArrayTypes = ['errors' => [Error::class]];

    /**
     * @param  ?GetShipmentItemsResult  $payload
     * @param  Error[]|null  $errors A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?GetShipmentItemsResult $payload = null,
        public readonly ?array $errors = null,
    ) {
    }
}
