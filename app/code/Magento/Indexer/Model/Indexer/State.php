<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Indexer\Model\Indexer;

/**
 * @method string getIndexerId()
 * @method \Magento\Indexer\Model\Indexer\State setIndexerId($value)
 * @method string getStatus()
 * @method \Magento\Indexer\Model\Indexer\State setStatus($value)
 * @method string getUpdated()
 * @method \Magento\Indexer\Model\Indexer\State setUpdated($value)
 */
class State extends \Magento\Core\Model\AbstractModel
{
    /**
     * Indexer statuses
     */
    const STATUS_WORKING = 'working';
    const STATUS_VALID = 'valid';
    const STATUS_INVALID = 'invalid';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'indexer_state';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'indexer_state';

    /**
     * @param \Magento\Core\Model\Context $context
     * @param \Magento\Core\Model\Registry $registry
     * @param \Magento\Indexer\Model\Resource\Indexer\State $resource
     * @param \Magento\Indexer\Model\Resource\Indexer\State\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Core\Model\Context $context,
        \Magento\Core\Model\Registry $registry,
        \Magento\Indexer\Model\Resource\Indexer\State $resource,
        \Magento\Indexer\Model\Resource\Indexer\State\Collection $resourceCollection,
        array $data = array()
    ) {
        if (!isset($data['status'])) {
            $data['status'] = self::STATUS_INVALID;
        }
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _beforeSave()
    {
        $this->setUpdated(time());
        return parent::_beforeSave();
    }
}