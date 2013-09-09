<?php

/**
 * Isotope eCommerce for Contao Open Source CMS
 *
 * Copyright (C) 2009-2012 Isotope eCommerce Workgroup
 *
 * @package    Isotope
 * @link       http://www.isotopeecommerce.com
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 */

namespace Isotope\Model;

use Isotope\Interfaces\IsotopeProductCollection;


/**
 * ProductCollectionDownload model represents a download in a collection (usually an order)
 *
 * @copyright  Isotope eCommerce Workgroup 2009-2012
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 */
class ProductCollectionDownload extends \Model
{

    /**
     * Name of the current table
     * @var string
     */
    protected static $strTable = 'tl_iso_product_collection_download';

    /**
     * Find all downloads that belong to items of a given collection
     * @param   IsotopeProductCollection
     * @return  \Collection|null
     */
    public static function findByCollection(IsotopeProductCollection $objCollection, $arrOptions)
    {
        $arrOptions = array_merge(
			array(
				'column' => ("pid IN (SELECT id FROM tl_iso_product_collection_item WHERE pid=?)"),
				'value'  => $objCollection->id,
				'return' => 'Collection'
			),
			$arrOptions
		);

		return static::find($arrOptions);
    }
}
