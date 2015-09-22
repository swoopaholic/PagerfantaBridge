<?php
/*
 * This file is part of the Swoopaholic Framework Bundle.
 *
 * (c) Danny Dörfel <danny@swoopaholic.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Swoopaholic\Bridge\Pagerfanta;

class View
{
    /**
     * @var array
     */
    public $pages = array();

    /**
     * @var int
     */
    public $pagesCount = 0;

    /**
     * @var int
     */
    public $currentPage = 1;

    /**
     * @var string
     */
    public $next;

    /**
     * @var string
     */
    public $prev;

    /**
     * @var string
     */
    public $first;

    /**
     * @var string
     */
    public $last;

    /**
     * @var
     */
    public $dataSlice;
}
