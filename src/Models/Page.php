<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\BootstrapCMS\Models;

use GrahamCampbell\Credentials\Models\Relations\Common\BelongsToUserTrait;
use GrahamCampbell\Credentials\Models\Relations\Common\RevisionableTrait;
use GrahamCampbell\Credentials\Models\Relations\Interfaces\BelongsToUserInterface;
use GrahamCampbell\Credentials\Models\Relations\Interfaces\RevisionableInterface;
use GrahamCampbell\Database\Models\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use McCool\LaravelAutoPresenter\PresenterInterface;

/**
 * This is the page model class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class Page extends AbstractModel implements BelongsToUserInterface, RevisionableInterface, PresenterInterface
{
    use BelongsToUserTrait, RevisionableTrait, SoftDeletingTrait;

    /**
     * The table the pages are stored in.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The model name.
     *
     * @var string
     */
    public static $name = 'page';

    /**
     * The properties on the model that are dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The revisionable columns.
     *
     * @var array
     */
    protected $keepRevisionOf = ['title', 'nav_title', 'slug', 'body', 'css', 'js', 'show_title', 'show_nav', 'icon'];

    /**
     * The columns to select when displaying an index.
     *
     * @var array
     */
    public static $index = ['id', 'slug', 'title', 'nav_title'];

    /**
     * The max pages per page when displaying a paginated index.
     *
     * @var int
     */
    public static $paginate = 10;

    /**
     * The columns to order by when displaying an index.
     *
     * @var string
     */
    public static $order = 'slug';

    /**
     * The direction to order by when displaying an index.
     *
     * @var string
     */
    public static $sort = 'asc';

    /**
     * The page validation rules.
     *
     * @var array
     */
    public static $rules = [
        'title'      => 'required',
        'nav_title'  => 'required',
        'slug'       => 'required|alpha_dash',
        'body'       => 'required',
        'show_title' => 'required',
        'show_nav'   => 'required',
        'user_id'    => 'required',
    ];

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenter()
    {
        return 'GrahamCampbell\BootstrapCMS\Presenters\PagePresenter';
    }

    /**
     * Before deleting an existing model.
     *
     * @throws \Exception
     *
     * @return void
     */
    public function beforeDelete()
    {
        if ($this->slug == 'home') {
            throw new \Exception('You cannot delete the homepage.');
        }
    }
}
