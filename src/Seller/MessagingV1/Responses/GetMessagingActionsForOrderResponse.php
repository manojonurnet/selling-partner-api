<?php

namespace SellingPartnerApi\Seller\MessagingV1\Responses;

use Crescat\SaloonSdkGenerator\BaseResponse;
use SellingPartnerApi\Seller\MessagingV1\Dto\Embedded;
use SellingPartnerApi\Seller\MessagingV1\Dto\Error;
use SellingPartnerApi\Seller\MessagingV1\Dto\Links;

final class GetMessagingActionsForOrderResponse extends BaseResponse
{
    protected static array $attributeMap = ['links' => '_links', 'embedded' => '_embedded'];

    protected static array $complexArrayTypes = ['errors' => [Error::class]];

    /**
     * @param  ?Links  $links
     * @param  ?Embedded  $embedded
     * @param  Error[]|null  $errors A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?Links $links = null,
        public readonly ?Embedded $embedded = null,
        public readonly ?array $errors = null,
    ) {
    }
}
