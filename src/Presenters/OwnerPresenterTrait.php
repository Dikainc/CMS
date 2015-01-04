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

/**
 * This is the owner presenter trait.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
trait OwnerPresenterTrait
{
    /**
     * Get the owner.
     *
     * @return string
     */
    public function owner()
    {
        $user = $this->resource->user()->withTrashed()
            ->cacheDriver('array')->rememberForever()
            ->first(['first_name', 'last_name', 'email']);

        return $user->first_name.' '.$user->last_name.' ('.$user->email.')';
    }
}
