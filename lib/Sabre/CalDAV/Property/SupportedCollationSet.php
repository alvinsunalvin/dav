<?php

namespace Sabre\CalDAV\Property;
use Sabre\DAV;

/**
 * supported-collation-set property
 *
 * This property is a representation of the supported-collation-set property
 * in the CalDAV namespace.
 *
 * @package Sabre
 * @subpackage CalDAV
 * @copyright Copyright (C) 2007-2012 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/) 
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class SupportedCollationSet extends DAV\Property {

    /**
     * Serializes the property in a DOM document
     *
     * @param Sabre\DAV\Server $server
     * @param DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $node) {

        $doc = $node->ownerDocument;

        $prefix = $node->lookupPrefix('urn:ietf:params:xml:ns:caldav');
        if (!$prefix) $prefix = 'cal';

        $node->appendChild(
            $doc->createElement($prefix . ':supported-collation','i;ascii-casemap')
        );
        $node->appendChild(
            $doc->createElement($prefix . ':supported-collation','i;octet')
        );
        $node->appendChild(
            $doc->createElement($prefix . ':supported-collation','i;unicode-casemap')
        );


    }

}
