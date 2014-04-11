<?php
/**
 * Created 16-02-14 00:20
 */
namespace Swoopaholic\Bridge\Pagerfanta;

use Pagerfanta\Pagerfanta as Base;
use Symfony\Component\Routing\RouterInterface;

class Pagerfanta extends Base
{
    /**
     * @param RouterInterface $router
     * @param string $route
     * @param array $params
     *
     * @return View
     */
    public function createView(RouterInterface $router, $route, $params)
    {
        $view = new View();

        $view->count = $this->getNbPages();
        $view->currentPage = $this->getCurrentPage();
        $view->pages = $this->getPagerLinks($router, $route, $params);
        /** @noinspection PhpParamsInspection */
        $view->first = reset($view->pages);
        /** @noinspection PhpParamsInspection */
        $view->last = end($view->pages);
        $view->next = $this->hasNextPage() ? $view->pages[$view->currentPage + 1] : null;
        $view->prev = $this->hasPreviousPage() ? $view->pages[$view->currentPage - 1] : null;

        return $view;
    }

    /**
     * @param $router
     * @param $route
     * @param $params
     * @return \ArrayIterator
     */
    private function getPagerLinks($router, $route, $params)
    {
        $pages = new \ArrayIterator();

        $total = $this->getNbPages();
        for ($page = 1; $page <= $total; $page++) {
            $pageParams = array_merge($params, array('page' => $page));
            $pages[$page] = $router->generate($route, $pageParams);
        }

        return $pages;
    }
}
