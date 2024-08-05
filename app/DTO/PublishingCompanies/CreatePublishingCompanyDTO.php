<?php

namespace App\DTO\PublishingCompanies;

class CreatePublishingCompanyDTO
{
    public function __construct(
        readonly public string $publishing_company,
    ) {
        //
    }
}
