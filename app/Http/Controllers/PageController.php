<?php

namespace App\Http\Controllers;

use App\Enums\Micromarkup\JsonLdType;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Services\MicromarkupService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class PageController extends Controller
{
    protected MicromarkupService $microdataService;

    public function __construct(MicromarkupService $microdataService)
    {
        $this->microdataService = $microdataService;
    }

    /**
     * Home page
     * @param Request $request
     * @return View
     * @throws Exception
     */
    public function home(Request $request): View
    {
        $micromarkup_org = $this->microdataService->generateJsonLd(
            type: JsonLdType::ORGANIZATION->value,
            data: [
                'url' => url('/'),
                'name' => 'Maxima',
                'email' => 'npomaxima@gmail.com',
                'contactPoint' => [
                    "@type" => JsonLdType::CONTACTPOINT->value,
                    "telephone" => "+38 (095) 225 25 35",
                    "areaServed" => "UA",
                    "contactType" => "customer service"
                ],
                'address' => [
                    "@type" => JsonLdType::POSTALADDRESS->value,
                    "streetAddress" => "ул.Вишневая, 27",
                    "addressLocality" => "Харьков",
                    "addressRegion" => "Харьковская область",
                    "addressCountry" => [
                        "@type" => "Country",
                        "name" => "Украина"
                    ]
                ]
            ]
        );

        $micromarkup_search = $this->microdataService->generateJsonLd(
            type: JsonLdType::WEBSITE->value,
            data: [
                'url' => url('/'),
                'name' => 'Maxima',
                'potentialAction' => [
                    "@type" => JsonLdType::SEARCHACTION->value,
                    "telephone" => "+38 (095) 225 25 35",
                    "target" => "https://liteyka.net/site_search?search_term={search_term}", // todo: change search
                    "query-input" => "required name=search_term"
                ],
                "alternateName" => rtrim(preg_replace('#^https?://#', '', Config::get('app.url')), '/')
            ]
        );

        $categories = ProductCategory::where('status', 1)
            ->limit(6)
            ->get();

        return view(
            view: 'pages/home',
            data: [
                'categories'  => $categories,
                'micromarkup' => $micromarkup_org,
            ]
        );
    }

    /**
     * Products page
     * @param Request $request
     * @return View
     */
    public function products(Request $request): View
    {
        $categories = ProductCategory::where('status', 1)->get();

        return view(
            view: 'pages/products',
            data: [
                'categories' => $categories
            ]);
    }

    /**
     * Services page
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function services(Request $request): View|RedirectResponse
    {
        try {
            $services = Service::get();

            return view(
                view: 'pages/services',
                data: ['services' => $services]
            );
        } catch (Exception $e) {
            return redirect()
                ->route('page.services')
                ->with(
                    key: 'error',
                    value: $e->getMessage(),
                );
        }
    }

    /**
     * About page
     * @param Request $request
     * @return View
     */
    public function about(Request $request): View
    {
        return view(view: 'pages/about');
    }

    /**
     * Payment and delivery page
     * @param Request $request
     * @return View
     */
    public function paymentAndDelivery(Request $request): View
    {
        return view(view: 'pages/payment_and_delivery');
    }

    /**
     * Contacts page
     * @param Request $request
     * @return View
     */
    public function contacts(Request $request): View
    {
        return view(view: 'pages/contacts');
    }
}
