<?php

/*
 * This file is part of the JuliusLoyaltyBundle package.
 *
 * (c) 2013 Jiabin <hello@jiab.in>
 */

namespace Eo\RedirectBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(repositoryClass="Eo\RedirectBundle\Document\RedirectRepository")
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Redirect
{
    /**
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $redirectFrom;

    /**
     * @ODM\String
     */
    protected $redirectTo;

    /**
     * @ODM\Date
     */
    protected $createdAt;

    /**
     * @ODM\Date
     */
    protected $updatedAt;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set redirectFrom
     *
     * @param string $redirectFrom
     * @return self
     */
    public function setRedirectFrom($redirectFrom)
    {
        $this->redirectFrom = $redirectFrom;

        return $this;
    }

    /**
     * Get redirectFrom
     *
     * @return string $redirectFrom
     */
    public function getRedirectFrom()
    {
        return $this->redirectFrom;
    }

    /**
     * Set redirectTo
     *
     * @param string $redirectTo
     * @return self
     */
    public function setRedirectTo($redirectTo)
    {
        $this->redirectTo = $redirectTo;

        return $this;
    }

    /**
     * Get redirectTo
     *
     * @return string $redirectTo
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param date $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return date $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
