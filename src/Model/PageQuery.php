<?php declare(strict_types=1);

namespace Rvadym\Paginator\Model;

use Rvadym\Paginator\ValueObject\Criteria;
use Rvadym\Paginator\ValueObject\Limit;
use Rvadym\Paginator\ValueObject\Offset;

class PageQuery
{
    /** @var Offset */
    private $offset;

    /** @var Limit */
    private $limit;

    /** @var Criteria */
    private $criteria;

    /**
     * PageQuery constructor.
     * @param Offset $offset
     * @param Limit $limit
     * @param Criteria|null $criteria
     */
    public function __construct(Offset $offset, Limit $limit, ?Criteria $criteria = null)
    {
        $this->offset = $offset;
        $this->limit = $limit;

        if (is_null($criteria)) {
            $criteria = new Criteria([]);
        }

        $this->criteria = $criteria;
    }

    public function getOffset(): Offset
    {
        return $this->offset;
    }

    public function getLimit(): Limit
    {
        return $this->limit;
    }

    public function getCriteria(): Criteria
    {
        return $this->criteria;
    }
}
