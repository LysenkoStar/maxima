<?php

namespace App\Enums\Micromarkup;

enum JsonLdType: string
{
    case PRODUCT         = 'Product';
    case BREADCRUMB_LIST = 'BreadcrumbList';
    case ORGANIZATION    = 'Organization';
    case POSTALADDRESS   = 'PostalAddress';
    case PERSON          = 'Person';
    case CONTACTPOINT    = 'ContactPoint';
    case WEBSITE         = 'WebSite';
    case SEARCHACTION    = 'SearchAction';
}
