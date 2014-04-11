<?php
/**
 * Created 01-02-14 17:16
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
    public $previous;

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
