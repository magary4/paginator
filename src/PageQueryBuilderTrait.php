<?php declare(strict_types=1);

namespace Rvadym\Paginator;

use Psr\Http\Message\ServerRequestInterface as Request;
use Rvadym\Paginator\Model\PageQuery;
use Rvadym\Paginator\ValueObject\Criteria;
use Rvadym\Paginator\ValueObject\Limit;
use Rvadym\Paginator\ValueObject\Offset;
use Rvadym\Types\StrictTypeHelperTrait;
use Rvadym\Types\ValueObject\Exception\NotPositiveIntException;

trait PageQueryBuilderTrait
{
    use StrictTypeHelperTrait;

    /**
     * @throws NotPositiveIntException
     */
    private function validateAndPreparePageQuery(
        Request $request,
        Criteria $criteria,
        int $defaultOffset = 0,
        int $defaultLimit = 10
    ): PageQuery {
        $data = $request->getQueryParams();

        $offsetValue = $this->filterLessThanZero(
            $this->filterInt($data['offset'] ?? $defaultOffset)
        ) ?? $defaultOffset;

        $limitValue = $this->filterLessThanZero(
            $this->filterInt($data['limit'] ?? $defaultLimit)
        ) ?? $defaultLimit;

        return new PageQuery(
            new Offset($offsetValue),
            new Limit($limitValue),
            $criteria
        );
    }
}
