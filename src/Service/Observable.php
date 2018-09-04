<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_ZfcImporter
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Popov\ZfcImporter\Service;

use Popov\Importer\Importer;
use Popov\Importer\ObservableInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

class Observable implements ObservableInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    protected $eventIdentifier = Importer::class;

    public function trigger($eventName, $target = null, $params = [])
    {
        $this->getEventManager()->trigger($eventName, $target, $params);
    }

    public function attach($eventName, callable $listener)
    {
        $this->getEventManager()->attach($eventName, $listener);
    }

    public function detach(callable $listener, $eventName)
    {
        $this->getEventManager()->detach($listener, $eventName);
    }
}