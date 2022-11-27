<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuBuilder;

class MaterialDashboardPro
{
    private Request $request;
    private array $menu = [];
    private string $pageTitle = 'Page';
    private $user = null;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->setMenu();
        $this->setUser($this->request->user());
    }

    public function getRandomBackgroundUrl(): string
    {
        return \sprintf('https://picsum.photos/2880/1920?blur=%d', 2);
    }

    /**
     * @return void
     */
    private function setMenu(): void
    {
        /** @var MenuBuilder $menuBuilder */
        $menuBuilder = resolve(MenuBuilder::class);
        $this->menu = $menuBuilder->build();
    }

    /**
     * @param Model|null $user
     * @return $this
     */
    private function setUser(?Model $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function hasUser(string $guard = null)
    {
        return $this->request->user($guard) ?? false;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPageTitle(): string
    {
        return $this->pageTitle;
    }

    public function setPageTitle(string $pageTitle): static
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    public function getMenu(): array
    {
        return $this->menu;
    }
}
