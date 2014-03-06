<?php

/*
 * This file is part of the EoRedirectBundle package.
 *
 * (c) 2014 Eymen Gunay <eymen@egunay.com>
 */
namespace Eo\RedirectBundle\Model;

/**
 * RedirectInterface
 */
interface RedirectInterface
{
    /**
     * Set replacement
     *
     * @param string $replacement
     * @return self
     */
    public function setPattern($replacement);

    /**
     * Get replacement
     *
     * @return string $replacement
     */
    public function getPattern();

    /**
     * Set pattern
     *
     * @param string $pattern
     * @return self
     */
    public function setReplacement($pattern);

    /**
     * Get pattern
     *
     * @return string $pattern
     */
    public function getReplacement();
}
