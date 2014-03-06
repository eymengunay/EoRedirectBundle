<?php

/*
 * This file is part of the EoRedirectBundle package.
 *
 * (c) 2014 Eymen Gunay <eymen@egunay.com>
 */
namespace Eo\RedirectBundle\Document;

use Eo\RedirectBundle\Util\RegexUtil;
use Doctrine\ODM\MongoDB\DocumentRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * RedirectRepository
 */
class RedirectRepository extends DocumentRepository
{
    /**
     * Get redirect from url
     *
     * @param  string $url
     * @return RedirectInterface
     */
    public function findUrl($url)
    {
        $redirects = $this->createQueryBuilder()
            ->field('pattern')->exists(true)
            ->field('replacement')->exists(true)
            ->getQuery()
            ->execute()
        ;

        foreach ($redirects as $redirect) {
            if (!preg_match(RegexUtil::regexify($redirect->getPattern()), $url)) {
                continue;
            }

            return $redirect;
        }

        return null;
    }
}
