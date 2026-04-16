<?php

use CodeIgniter\CodeIgniter;
use App\Libraries\JShrink\Minifier;

function JSMinify()
{
	$config = new \Config\Torrent;
	$minInlineJs = '';
	$jsPath = $config->fullThemePath . $config->js_path . DIRECTORY_SEPARATOR;
	$minifyJsFileName = $jsPath . $config->minifyJsFileName;
	if ( ! file_exists($minifyJsFileName) || filectime($minifyJsFileName) < time() - $config->jsLifeTime )
	{
		foreach ($config->siteJs as $jsFile)
		{
			$file = file_get_contents($jsPath . $jsFile);
			$minInlineJs .= \JShrink\Minifier::minify($file, ['flaggedComments' => false]);
		}
		file_put_contents($minifyJsFileName, $minInlineJs);
	}
	$aryJs = [$config->minifyJsFileName];
	return $aryJs;
}

function CSSMinify()
{
	$config = new \Config\Torrent;
	$minInlineCss = '';
	$cssPath = $config->fullThemePath . $config->css_path . DIRECTORY_SEPARATOR;
	$minifyCssFileName = $cssPath . $config->minifyCssFileName;
	if ( ! file_exists($minifyCssFileName) || filectime($minifyCssFileName) < time() - $config->cssLifeTime )
	{
		foreach ($config->siteCSS as $cssFile)
		{
			$css = file_get_contents($cssPath . $cssFile);
			$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
			$css = preg_replace('/\s*([{}|:;,])\s+/', '$1', $css);
			$css = str_replace(["\r\n", "\r", "\n", "\t"], '', $css);
			$minInlineCss .= trim($css);
		}
		file_put_contents($minifyCssFileName, $minInlineCss);
	}
	$aryCSS = [$config->minifyCssFileName];
	return $aryCSS;
}
