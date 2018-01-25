<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 *
 * Template Copyright by it-talent.de
 */

class Template
{
	var $error;
	var $vars = array();
	var $blocks = array();
	var $url;

	function template()
	{
		global $url;	
		$this->url = $url;
	}

	function assign($vars, $value = false)
	{
		if (is_array($vars))
		{
			$this->vars = array_merge($this->vars, $vars);
		}
		else if ($value)
		{
			$this->vars[$vars] = $value;
		}
	}

	function block_assign($name, $array)
	{
		$this->blocks[$name][] = (array)$array;
	}

	function compile_vars($var)
	{
		$newvar = $this->compile_var($var[1]);

		return "<?php echo isset(" . $newvar . ") ? " . $newvar . " : '{" . $var[1] . "}' ?>";
	}

	function compile_var($var)
	{
		if (!strpos($var, '.'))
		{
			$var = '$this->vars[\'' . $var . '\']';
		}
		else
		{
			$vars = explode('.', $var);

			if (!isset($this->blocks[$vars[0]]) && gettype($this->vars[$var[0]]) == 'array')
			{
				$var = '$this->vars[\'' . $vars[0] . '\'][\'' . $vars[1] . '\']';
			}
			else
			{
				$var = preg_replace("#(.*)\.(.*)#", "\$_$1['$2']", $var);

			}
		}

		return $var;
	}

	function compile_tags($match)
	{
		global $url;

		switch ($match[1])
		{
			case 'INCLUDE':
				return "<?php echo \$this->compile('" . $match[2] . "'); ?>";
			break;

			case 'INCLUDEPHP':
				return "<?php echo include('" . $url  . "/" . $match[2] . "'); ?>";
			break;

			case 'IF':
				return $this->compile_if($match[2], false);
			break;

			case 'ELSEIF':
				return $this->compile_if($match[2], true);
			break;

			case 'ELSE':
				return "<?php } else { ?>";
			break;

			case 'ENDIF':
				return "<?php } ?>";
			break;

			case 'BEGIN':
				return "<?php if (isset(\$this->blocks['" . $match[2] . "'])) { foreach (\$this->blocks['" . $match[2] . "'] as \$_" . $match[2] . ") { ?>";
			break;

			case 'BEGINELSE':
				return "<?php } } else { { ?>";
			break;

			case 'END':
				return "<?php } } ?>";
			break;
		 }
	}

	function compile_if($code, $elseif)
	{
		$ex = explode(' ', trim($code));
		$code = '';

		foreach ($ex as $value)
		{
			$chars = strtolower($value);

			switch ($chars)
			{
				case 'and':
				case '&&':
				case 'or':
				case '||':
				case '==':
				case '!=':
				case '>':
				case '<':
				case '>=':
				case '<=':
				case '0':
				case is_numeric($value):
					$code .= $value;
				break;

				case 'not':
					$code .= '!';
				break;

				default:

					if (preg_match('/^[A-Za-z0-9_\-\.]+$/i', $value))
					{
						$var = $this->compile_var($value);

						$code .= "(isset(" . $var . ") ? " . $var . " : '')";
					}
					else
					{
						$code .= '\'' . preg_replace("#(\\\\|\'|\")#", '', $value) . '\'';
					}

				break;
			}

			$code .= ' ';
		}

		return '<?php ' . (($elseif) ? '} else ' : '') . 'if (' . trim($code) . ") { ?>";
	}

	function compile($file)
	{
		global $_CONFIG;
		
		$abs_file = "lib/" . $file .".tpl.php";

		$tpl = $uncompiled = @file_get_contents($abs_file);
		$tpl = preg_replace("#<\?(.*)\?>#", '', $tpl);
		$tpl = preg_replace_callback("#<!- ([A-Z]+) (.*)? ?->#U", array($this, 'compile_tags'), $tpl);
		$tpl = preg_replace_callback("#{([A-Za-z0-9_\-.]+)}#U", array($this, 'compile_vars'), $tpl);

		if (eval(' ?>' . $tpl . '<?php ') === false)
		{
			$this->error($file, $uncompiled);
		}
	}

	function error($file, $tpl)
	{
		exit('Fehler im Template: <b>' . $file . '</b><hr /><pre>' . preg_replace("#&lt;!-- ([A-Z]+) (.*)? ?--&gt;#U", '<font color="red">$0</font>', htmlspecialchars($tpl)) . '</pre>');
	}

	function display($file)
	{
		page_vars();
		echo $this->compile($file);
		exit;
	}
}

?>