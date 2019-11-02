<?php declare(strict_types=1);

namespace Rvadym\Paginator\ValueObject;

class Criteria
{
    /** @var array */
    private $criteria;

    public function __construct(array $criteria)
    {
        $this->criteria = $criteria;
    }

    public function getValue(): array
    {
        return $this->criteria;
    }
}
