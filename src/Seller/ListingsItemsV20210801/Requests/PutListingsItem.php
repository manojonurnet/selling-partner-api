<?php

namespace SellingPartnerApi\Seller\ListingsItemsV20210801\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SellingPartnerApi\Seller\ListingsItemsV20210801\Dto\ListingsItemPutRequest;
use SellingPartnerApi\Seller\ListingsItemsV20210801\Responses\ErrorList;
use SellingPartnerApi\Seller\ListingsItemsV20210801\Responses\ListingsItemSubmissionResponse;

/**
 * putListingsItem
 */
class PutListingsItem extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param  string  $sellerId A selling partner identifier, such as a merchant account or vendor code.
     * @param  string  $sku A selling partner provided identifier for an Amazon listing.
     * @param  ListingsItemPutRequest  $listingsItemPutRequest The request body schema for the putListingsItem operation.
     * @param  array  $marketplaceIds A comma-delimited list of Amazon marketplace identifiers for the request.
     * @param  ?string  $issueLocale A locale for localization of issues. When not provided, the default language code of the first marketplace is used. Examples: "en_US", "fr_CA", "fr_FR". Localized messages default to "en_US" when a localization is not available in the specified locale.
     */
    public function __construct(
        protected string $sellerId,
        protected string $sku,
        public ListingsItemPutRequest $listingsItemPutRequest,
        protected array $marketplaceIds,
        protected ?string $issueLocale = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['marketplaceIds' => $this->marketplaceIds, 'issueLocale' => $this->issueLocale]);
    }

    public function resolveEndpoint(): string
    {
        return "/listings/2021-08-01/items/{$this->sellerId}/{$this->sku}";
    }

    public function createDtoFromResponse(Response $response): ListingsItemSubmissionResponse|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200 => ListingsItemSubmissionResponse::class,
            400, 403, 413, 415, 429, 500, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }

    public function defaultBody(): array
    {
        return $this->listingsItemPutRequest->toArray();
    }
}
