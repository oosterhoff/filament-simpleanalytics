<?php

namespace Oosterhoff\FilamentSimpleanalytics;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Oosterhoff\FilamentSimpleanalytics\Commands\FilamentSimpleanalyticsCommand;
use Oosterhoff\FilamentSimpleanalytics\Testing\TestsFilamentSimpleanalytics;
use Filament\Facades\Filament;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Oosterhoff\FilamentSimpleanalytics\Widgets\TodayVisitorsWidget;
use Oosterhoff\FilamentSimpleanalytics\Widgets\TodayPageviewsWidget;

class FilamentSimpleanalyticsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-simpleanalytics';

    public static string $viewNamespace = 'filament-simpleanalytics';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile('filament-simpleanalytics')
            ->hasViews()
            ->hasMigration('create_filament-simpleanalytics_table')
            ->hasCommand(FilamentSimpleanalyticsCommand::class)
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('oosterhoff/filament-simpleanalytics');
            });
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Widget Registration
        Filament::registerWidgets([
            TodayVisitorsWidget::class,
            TodayPageviewsWidget::class,
        ]);

        // Testing
        Testable::mixin(new TestsFilamentSimpleanalytics());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'oosterhoff/filament-simpleanalytics';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-simpleanalytics', __DIR__ . '/../resources/dist/components/filament-simpleanalytics.js'),
            // Css::make('filament-simpleanalytics-styles', __DIR__ . '/../resources/dist/filament-simpleanalytics.css'),
            // Js::make('filament-simpleanalytics-scripts', __DIR__ . '/../resources/dist/filament-simpleanalytics.js'),
        ];
    }

    /**
     * @return array<class-string, string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }
}