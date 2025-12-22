<?php

namespace App\Filament\Resources\DefaultResource\Pages;

use App\Filament\Resources\DefaultResource;
use Filament\Resources\Pages\Page;

class MainDashboard extends Page
{
    protected static string $resource = DefaultResource::class;

    protected static string $view = 'filament.resources.default-resource.pages.main-dashboard';
}
