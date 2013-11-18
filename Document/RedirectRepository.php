<?php

/*
 * This file is part of the JuliusContentBundle package.
 *
 * (c) 2013 Jiabin <hello@jiab.in>
 */

namespace Eo\RedirectBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * RedirectRepository
 */
class RedirectRepository extends DocumentRepository
{
    /**
     * Get content from request
     *
     * @param  Request          $request
     * @return ContentInterface
     */
    public function findRequest(Request $request)
    {
        $url = $request->getPathInfo();

        return $this->findOneBy(array('redirectFrom' => $url));
    }
}
