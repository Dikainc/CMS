<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\BootstrapCMS\Presenters;

use GrahamCampbell\BootstrapCMS\Models\Page;
use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the page presenter class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class PagePresenter extends BasePresenter
{
    use OwnerPresenterTrait;

    /**
     * Create a new instance.
     *
     * @param \GrahamCampbell\BootstrapCMS\Models\Page $page
     *
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->resource = $page;
    }
}
