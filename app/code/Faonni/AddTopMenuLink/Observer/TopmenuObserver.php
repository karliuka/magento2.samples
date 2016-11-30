<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_AddTopMenuLink
 * @copyright   Copyright (c) 2016 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Faonni\AddTopMenuLink\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Data\Tree\Node as TreeNode;

/**
 * Topmenu observer
 */
class TopmenuObserver implements ObserverInterface
{
    /**
     * Topmenu event handler
     *
     * @param EventObserver $observer
     * @return void	 
     */
    public function execute(EventObserver $observer)
    {
        /** @var \Magento\Framework\Data\Tree\Node $menu */
        $menu = $observer->getData('menu');
        $rootNode = new TreeNode(
            [
                'id'   => 'contact-node-root', // unique id
                'name' => 'Contact Us', // menu item label here
                'url'  => 'contact',    // url goes here
				'has_active' => false,
				'is_active'  => false   // expression to determine if menu item is selected or not
            ],
            'id',
            $menu->getTree(),
            null
        );
        $menu->addChild($rootNode);
    }
}