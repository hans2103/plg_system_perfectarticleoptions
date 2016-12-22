<?php
/**
 * @package     Perfect Sitemap
 * @subpackage  plg_perfectsitemap
 *
 * @copyright   Copyright (C) 2015 Perfect Web Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Perfect Sitemap plugin
 *
 * @since  1.0.0
 */
class PlgSystemPerfectArticleoptions extends JPlugin
{
	// Autoload language
	protected $autoloadLanguage = true;

	// JFactory::getApplication()
	public $app;

	/**
	 * Adds additional fields to the user editing form
	 *
	 * @param   JForm  $form  The form to be altered.
	 * @param   mixed  $data  The associated data for the form.
	 *
	 * @return  boolean
	 *
	 * @since   1.0.0
	 */
	public function onContentPrepareForm($form, $data)
	{
		// Make sure form element is a JForm object
		if (!($form instanceof JForm))
		{
			$this->_subject->setError("JERROR_NOT_A_FORM");

			return false;
		}

		$name = $form->getName();
		if (!in_array($name, array('com_content.article')) && !in_array($name, array('com_categories.categorycom_content'))):
		    return true;
		endif;
		// Make sure we are on the edit article item page
		if (in_array($name, array('com_content.article'))):
		    // Load form.xml
		    JForm::addFormPath(__DIR__ . '/forms');
		    $form->loadFile('perfectarticleoptions');
		    return true;
		endif;
		// Make sure we are on the edit article item page
		if (in_array($name, array('com_categories.categorycom_content'))):
		    // Load form.xml
		    JForm::addFormPath(__DIR__ . '/forms');
		    $form->loadFile('perfectcategoryoptions');
		    return true;
		endif;
	return true;
	}
}
