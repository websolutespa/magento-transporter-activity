<?php
/*
 * Copyright © Websolute spa. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Websolute\TransporterActivity\Model;

use DateTime;
use Exception;
use Magento\Framework\DataObject;
use Magento\Framework\Model\AbstractExtensibleModel;
use Websolute\TransporterActivity\Api\Data\ActivityInterface;
use function json_decode;

class ActivityModel extends AbstractExtensibleModel implements ActivityInterface
{
    const ID = 'activity_id';
    const TYPE = 'type';
    const STATUS = 'status';
    const EXTRA = 'extra';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const CACHE_TAG = 'transporter_activity';
    protected $_cacheTag = 'transporter_activity';
    protected $_eventPrefix = 'transporter_activity';

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return (string)$this->getData(self::TYPE);
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->setData(self::TYPE, $type);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return (string)$this->getData(self::STATUS);
    }

    /**
     * @param $value
     */
    public function setStatus($value)
    {
        $this->setData(self::STATUS, $value);
    }

    /**
     * @param array $value
     */
    public function addExtraArray(array $value)
    {
        $newValue = new DataObject($this->getExtra()->getData());
        $newValue->addData($value);
        $this->setData(self::EXTRA, $newValue->toJson());
    }

    /**
     * @return DataObject
     */
    public function getExtra(): DataObject
    {
        $data = $this->getData(self::EXTRA) ? json_decode($this->getData(self::EXTRA), true) : [];
        return new DataObject($data);
    }

    /**
     * @param DataObject $value
     */
    public function setExtra(DataObject $value)
    {
        $this->setData(self::EXTRA, $value->toJson());
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->getData(self::CREATED_AT));
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getUpdatedAt(): DateTime
    {
        return new DateTime($this->getData(self::UPDATED_AT));
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\ActivityResourceModel::class);
    }
}
