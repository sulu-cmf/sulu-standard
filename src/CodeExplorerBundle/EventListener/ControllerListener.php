<?php

/*
 * This file is part of Sulu.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeExplorerBundle\EventListener;

use CodeExplorerBundle\Twig\SourceCodeExtension;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

/**
 * Defines the method that 'listens' to the 'kernel.controller' event, which is
 * triggered whenever a controller is executed in the application.
 * See http://symfony.com/doc/current/book/internals.html#kernel-controller-event.
 *
 * Tip: listeners are common in Symfony applications, but this particular listener
 * is too advanced and too specific for the demo application needs. For more common
 * examples see http://symfony.com/doc/current/cookbook/service_container/event_listener.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class ControllerListener
{
    private $twigExtension;

    public function __construct(SourceCodeExtension $twigExtension)
    {
        $this->twigExtension = $twigExtension;
    }

    public function registerCurrentController(FilterControllerEvent $event)
    {
        // this check is needed because in Symfony a request can perform any
        // number of sub-requests. See
        // http://symfony.com/doc/current/components/http_kernel/introduction.html#sub-requests
        if ($event->isMasterRequest()) {
            $this->twigExtension->setController($event->getController());
        }
    }
}
