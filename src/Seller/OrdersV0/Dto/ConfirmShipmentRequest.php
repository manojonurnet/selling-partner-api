<?php

namespace SellingPartnerApi\Seller\OrdersV0\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class ConfirmShipmentRequest extends BaseDto
{
    /**
     * @param  PackageDetail  $packageDetail Properties of packages
     * @param  string  $codCollectionMethod The cod collection method, support in JP only.
     * @param  string  $marketplaceId The unobfuscated marketplace identifier.
     */
    public function __construct(
        public readonly PackageDetail $packageDetail,
        public readonly ?string $codCollectionMethod,
        public readonly string $marketplaceId,
    ) {
    }
}
