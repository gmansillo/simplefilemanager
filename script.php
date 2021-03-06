<?php

/**
 * @package     Firedrive
 * @author      Giovanni Mansillo
 * @license     GNU General Public License version 2 or later; see LICENSE.md
 * @copyright   Firedrive
 * @since       5.2.2
 */
defined('_JEXEC') or die;

class com_firedriveInstallerScript
{

	function preflight($type, $parent)
	{
		$jversion = new JVersion();
		$manifest = $parent->getManifest();

		$minimum_joomla_release = $manifest->attributes()->version;
		$current_simple_version = $manifest->version;

		// Abort if the current Joomla release is older
		if (version_compare($jversion->getShortVersion(), $minimum_joomla_release, 'lt'))
		{
			$errorMessage = sprintf(JText::_('COM_FIREDRIVE_PREFLIGHT_VERSION_ERROR'), $current_simple_version, $minimum_joomla_release, $jversion->getShortVersion());
			JFactory::getApplication()->enqueueMessage($errorMessage, 'warning');

			return false;
		}
	}

	/**
	 * $parent is the class calling this method.
	 * install runs after the database scripts are executed.
	 * If the extension is new, the install method is run.
	 * If install returns false, Joomla will abort the install and undo everything already done.
	 * @since   5.2.1
	 */
	function install($parent)
	{
	}

	/**
	 * $parent is the class calling this method.
	 * update runs after the database scripts are executed.
	 * If update returns false, Joomla will abort the update and undo everything already done.
	 * @since   5.2.1
	 */
	function update($parent)
	{

	}

	/**
	 * $parent is the class calling this method
	 * uninstall runs before any other action is taken (file removal or database processing).
	 * @since   5.2.1
	 */
	function uninstall($parent)
	{
		//$message = JText::_('COM_FIREDRIVE_UNINSTALL_TEXT'); // TODO: Sorry to see you go
		//JFactory::getApplication()->enqueueMessage($message, 'info');
	}

}
