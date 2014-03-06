<?php

/*
 * This file is part of the EoRedirectBundle package.
 *
 * (c) 2014 Eymen Gunay <eymen@egunay.com>
 */
namespace Eo\RedirectBundle\Document;

use Eo\RedirectBundle\Model\RedirectInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(repositoryClass="Eo\RedirectBundle\Document\RedirectRepository")
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Redirect implements RedirectInterface
{
    /**
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $pattern;

    /**
     * @ODM\String
     */
    protected $replacement;

    /**
     * @ODM\Int
     */
    protected $statusCode = 302;

    /**
     * @ODM\Date
     */
    protected $createdAt;

    /**
     * @ODM\Date
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

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
     * {@inheritdoc}
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * {@inheritdoc}
     */
    public function setReplacement($replacement)
    {
        $this->replacement = $replacement;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReplacement()
    {
        return $this->replacement;
    }

    /**
     * Sets the response status code.
     *
     * @param integer $code HTTP status code
     */
    public function setStatusCode($code)
    {
        $this->statusCode = $code = (int) $code;

        return $this;
    }

    /**
     * Retrieves the status code for the current redirect.
     *
     * @return integer Status code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
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
