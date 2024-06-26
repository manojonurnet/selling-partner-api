<?php

namespace SellingPartnerApi\Seller\FBASmallAndLightV1\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SellingPartnerApi\Seller\FBASmallAndLightV1\Responses\ErrorList;
use SellingPartnerApi\Seller\FBASmallAndLightV1\Responses\SmallAndLightEligibility;

/**
 * getSmallAndLightEligibilityBySellerSKU
 */
class GetSmallAndLightEligibilityBySellerSku extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $sellerSku The seller SKU that identifies the item.
     * @param  array  $marketplaceIds The marketplace for which the eligibility status is retrieved. NOTE: Accepts a single marketplace only.
     */
    public function __construct(
        protected string $sellerSku,
        protected array $marketplaceIds,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['marketplaceIds' => $this->marketplaceIds]);
    }

    public function resolveEndpoint(): string
    {
        return "/fba/smallAndLight/v1/eligibilities/{$this->sellerSku}";
    }

    public function createDtoFromResponse(Response $response): SmallAndLightEligibility|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200 => SmallAndLightEligibility::class,
            400, 403, 404, 413, 415, 429, 500, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }
}
