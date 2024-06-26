<?php

namespace SellingPartnerApi\Vendor\DirectFulfillmentShippingV20211228\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class PartyIdentification extends BaseDto
{
    protected static array $complexArrayTypes = ['taxRegistrationDetails' => [TaxRegistrationDetails::class]];

    /**
     * @param  string  $partyId Assigned Identification for the party.
     * @param  ?Address  $address Address of the party.
     * @param  TaxRegistrationDetails[]  $taxRegistrationDetails Tax registration details of the entity.
     */
    public function __construct(
        public readonly string $partyId,
        public readonly ?Address $address = null,
        public readonly ?array $taxRegistrationDetails = null,
    ) {
    }
}
