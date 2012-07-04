<?php

/**
 * This node represents a list of notifications.
 *
 * It provides no additional functionality, but you must implement this
 * interface to allow the Notifications plugin to mark the collection
 * as a notifications collection.
 *
 * This collection should only return Sabre_CalDAV_Notifications_INotification
 * nodes as it's children.
 * 
 * @package Sabre
 * @copyright Copyright (C) 2007-2012 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/) 
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class Sabre_CalDAV_Notifications_Notifications extends Sabre_DAV_Collection implements Sabre_CalDAV_Notifications_INotifications {

    /**
     * The notification backend
     * 
     * @var Sabre_CalDAV_Notifications_Backend_Abstract 
     */
    protected $notificationBackend;

    /**
     * Principal uri 
     * 
     * @var string 
     */
    protected $principalUri;

    /**
     * Constructor
     * 
     * @param Sabre_CalDAV_Notifications_Backend_Abstract $notificationBackend
     * @param string $principalUri 
     */
    public function __construct(Sabre_CalDAV_Notifications_Backend_Abstract $notificationBackend, $principalUri) {

        $this->notificationBackend = $notificationBackend;
        $this->principalUri = $principalUri;

    }

    /**
     * Returns all notifications for a principal
     * 
     * @return array 
     */
    public function getChildren() {

        $children = array();
        $notifications = $this->notificationBackend->getNotificationsForPrincipal($this->principalUri);

        foreach($notifications as $notification) {

            $children[] = new Sabre_CalDAV_Notifications_Notification(
                $this->notificationBackend,
                $notification
            );
        }

        return $children;

    }

    /**
     * Returns the name of this object
     * 
     * @return string 
     */
    public function getName() {

        return 'notification';

    }

}
