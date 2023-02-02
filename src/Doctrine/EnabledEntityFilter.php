<?php

namespace App\Doctrine;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

/**
 * Class VisibleEntityFilter
 *
 * @package App\Doctrine
 */
class EnabledEntityFilter extends SQLFilter
{
    /**
     * addFilterConstraint
     *
     * @param ClassMetadata $targetEntity
     * @param string $targetTableAlias
     *
     * @return string
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        return "{$targetTableAlias}.isEnabled = 1";
    }
}
