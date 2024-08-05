<?php

namespace App\DTO\PublishingCompanies;

class EditPublishingCompanyDTO
{
    public function __construct(
        readonly public string $id,
        readonly public string $publishing_company,
    ) {
        //
    }
}
