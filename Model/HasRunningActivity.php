<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model;

use DateInterval;
use DateTime;
use Exception;
use Websolute\TransporterActivity\Model\ResourceModel\Activity\ActivityCollectionFactory;
use Websolute\TransporterBase\Model\Config;

class HasRunningActivity
{

    /**
     * @var ActivityCollectionFactory
     */
    private $collectionFactory;

    /**
     * @var Config
     */
    private $config;

    /**
     * @param ActivityCollectionFactory $collectionFactory
     * @param Config $config
     */
    public function __construct(
        ActivityCollectionFactory $collectionFactory,
        Config $config
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->config = $config;
    }

    /**
     * @param string $type
     * @return bool
     * @throws Exception
     */
    public function execute(string $type): bool
    {
        $statuses = [
            ActivityStateInterface::DOWNLOADING,
            ActivityStateInterface::DOWNLOADED,
            ActivityStateInterface::MANIPULATING,
            ActivityStateInterface::MANIPULATED,
            ActivityStateInterface::UPLOADING
        ];
        return $this->check($statuses, $type);
    }

    /**
     * @param string $type
     * @return bool
     * @throws Exception
     */
    public function hasDownloading(string $type): bool
    {
        $statuses = [
            ActivityStateInterface::DOWNLOADING
        ];
        return $this->check($statuses, $type);
    }

    /**
     * @param string $type
     * @return bool
     * @throws Exception
     */
    public function hasManipulating(string $type): bool
    {
        $statuses = [
            ActivityStateInterface::MANIPULATING
        ];
        return $this->check($statuses, $type);
    }

    /**
     * @param string $type
     * @return bool
     * @throws Exception
     */
    public function hasUploading(string $type): bool
    {
        $statuses = [
            ActivityStateInterface::UPLOADING
        ];
        return $this->check($statuses, $type);
    }

    /**
     * @param array $statuses
     * @param string $type
     * @return bool
     * @throws Exception
     */
    private function check(array $statuses, string $type): bool
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter(ActivityModel::TYPE, ['eq' => $type]);
        $collection->addFieldToFilter(ActivityModel::STATUS, ['in' => $statuses]);

        $activities = $collection->getItems();

        $hasRunningActivity = false;

        if (count($activities)) {
            $semaphoreThreshold = $this->config->getSemaphoreThreshold();
            $expireDateTime = new DateTime('now');
            $expireDateTime->sub(new DateInterval('PT' . $semaphoreThreshold . 'M'));
            /** @var ActivityModel $activity */
            foreach ($activities as $activity) {
                if ($activity->getCreatedAt() > $expireDateTime) {
                    $hasRunningActivity = true;
                    break;
                }
            }
        }

        return $hasRunningActivity;
    }
}
