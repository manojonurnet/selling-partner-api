<?php

namespace SellingPartnerApi\Seller\FBAOutboundV20200701\Responses;

use Crescat\SaloonSdkGenerator\BaseResponse;
use SellingPartnerApi\Seller\FBAOutboundV20200701\Dto\Error;
use SellingPartnerApi\Seller\FBAOutboundV20200701\Dto\GetFulfillmentOrderResult;

final class GetFulfillmentOrderResponse extends BaseResponse
{
    protected static array $complexArrayTypes = ['errors' => [Error::class]];

    /**
     * @param  ?GetFulfillmentOrderResult  $payload
     * @param  Error[]|null  $errors A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?GetFulfillmentOrderResult $payload = null,
        public readonly ?array $errors = null,
    ) {
    }
}
