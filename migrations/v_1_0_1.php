<?php
/**
*
* @package Ad Units
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\adunits\migrations;

class v_1_0_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['adunits_version']) && version_compare($this->config['adunits_version'], '1.0.1', '>=');
	}

	static public function depends_on()
	{
		return array('\apwa\adunits\migrations\v_1_0_0');
	}

	public function update_data()
	{
		return array(
		// Add configs
			array('config.add', array('adunits_exclude', '')),
			// Current version
			array('config.update', array('adunits_version', '1.0.1')),

			// Add ACP modules
			array('module.add', array('acp', 'ACP_ADUNITS', array(
				'module_basename'	=> '\apwa\adunits\acp\adunits_module',
				'module_langname'	=> 'ADUNITS_EXCLUDE',
				'module_mode'		=> 'exclude',
				'module_auth'		=> 'ext_apwa/adunits && acl_a_board',
			))),
		);
	}
}