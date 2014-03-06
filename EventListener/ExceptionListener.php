<?php

/*
 * This file is part of the EoRedirectBundle package.
 *
 * (c) 2014 Eymen Gunay <eymen@egunay.com>
 */
namespace Eo\RedirectBundle\EventListener;

use Eo\RedirectBundle\Util\RegexUtil;
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
     * Kernel exception
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
        $url = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath() . $request->getRequestUri();
        // Set redirect response
        if ($redirect = $repository->findUrl($url)) {
            $newUrl = preg_replace(RegexUtil::regexify($redirect->getPattern()), $redirect->getReplacement(), $url);
            
            $response = new RedirectResponse($newUrl, $redirect->getStatusCode());
            $event->setResponse($response);
        }
    }
}
