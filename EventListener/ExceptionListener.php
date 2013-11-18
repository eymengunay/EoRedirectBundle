<?php

/*
 * This file is part of the JuliusEventBundle package.
 *
 * (c) 2013 Jiabin <hello@jiab.in>
 */

namespace Eo\RedirectBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

/**
 * ExceptionListener
 */
class ExceptionListener extends ContainerAware
{
    /**
     * Resolving prices and promotions can be a 
     * high resource consuming operation as it needs to 
     * iterate over all sectors, seances and events.
     *
     * To levarage the load it loads all found seances
     * into memory with a single query, checks for any 
     * attached promotions and resolves the default price
     * for those seances that don't belong to any promotion.
     * Once all available seance prices are resolved, it 
     * starts to associate seances to their events to calculate
     * remaining fields.
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $request   = $event->getRequest();

        if (!$exception instanceof NotFoundHttpException) {
            return;
        }

        $dm = $this->container->get('doctrine.odm.mongodb.document_manager');
        $repository = $dm->getRepository('EoRedirectBundle:Redirect');
        // Set redirect response
        if ($redirectTo = $repository->findRequest($request)) {
            $response = new RedirectResponse($redirectTo->getRedirectTo());
            $event->setResponse($response);
        }
    }
}
