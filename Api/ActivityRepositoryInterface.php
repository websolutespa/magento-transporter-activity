<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Websolute\TransporterActivity\Api\Data\ActivityInterface;
use Websolute\TransporterActivity\Api\Data\ActivitySearchResultInterface;

interface ActivityRepositoryInterface
{
    /**
     * @param int $id
     * @return ActivityInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): ActivityInterface;

    /**
     * @param string $type
     * @return ActivityInterface
     * @throws NoSuchEntityException
     */
    public function getFirstDownloadedByType(string $type): ActivityInterface;

    /**
     * @param string $type
     * @return ActivityInterface
     * @throws NoSuchEntityException
     */
    public function getLastDownloadedOrUploadedByType(string $type): ActivityInterface;

    /**
     * @param string $type
     * @return ActivityInterface
     * @throws NoSuchEntityException
     */
    public function getFirstManipulatedByType(string $type): ActivityInterface;

    /**
     * @param ActivityInterface $activity
     * @return ActivityInterface
     */
    public function save(ActivityInterface $activity);

    /**
     * @param ActivityInterface $activity
     * @return void
     */
    public function delete(ActivityInterface $activity);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ActivitySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ActivitySearchResultInterface;
}
