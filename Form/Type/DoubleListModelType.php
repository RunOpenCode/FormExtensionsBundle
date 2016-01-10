<?php

namespace Admingenerator\FormExtensionsBundle\Form\Type;

/**
 * See `Resources/doc/double-list/overview.md` for documentation
 *
 * @author Stéphane Escandell <stephane.escandell@gmail.com>
 */
class DoubleListModelType extends DoubleListType
{
    public function __construct()
    {
        parent::__construct('document');
    }

    public function getParent()
    {
        return 'Symfony\Bridge\Propel1\Form\Type\ModelType';
    }
}
