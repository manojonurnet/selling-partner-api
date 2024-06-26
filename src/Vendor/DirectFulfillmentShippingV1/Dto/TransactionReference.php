<?php

namespace SellingPartnerApi\Vendor\DirectFulfillmentShippingV1\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class TransactionReference extends BaseDto
{
    /**
     * @param  ?string  $transactionId GUID to identify this transaction. This value can be used with the Transaction Status API to return the status of this transaction.
     */
    public function __construct(
        public readonly ?string $transactionId = null,
    ) {
    }
}
