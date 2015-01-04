<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\BootstrapCMS\Presenters\RevisionDisplayers\Page;

use GrahamCampbell\BootstrapCMS\Presenters\RevisionDisplayers\AbstractRevisionDisplayer;

/**
 * This is the abstract displayer class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
abstract class AbstractDisplayer extends AbstractRevisionDisplayer
{
    /**
     * Get the change title.
     *
     * @return string
     */
    public function title()
    {
        return 'Updated Page';
    }

    /**
     * Get the page name.
     *
     * @param bool $final
     *
     * @return string
     */
    protected function name($final = true)
    {
        $page = $this->resource->revisionable()->withTrashed()
            ->cacheDriver('array')->rememberForever()
            ->first(['title']);

        if ($final) {
            return ' "'.$page->title.'".';
        }

        return ' "'.$page->title.'" ';
    }
}
