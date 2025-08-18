<?php
/**
 * TorrentPier – Bull-powered BitTorrent tracker engine
 *
 * @copyright Copyright (c) 2005-2025 TorrentPier (https://torrentpier.com)
 * @link      https://github.com/torrentpier/torrentpier for the canonical source repository
 * @license   https://github.com/torrentpier/torrentpier/blob/master/LICENSE MIT License
 */

//namespace TorrentPier\Legacy;
use CodeIgniter\CodeIgniter;

/**
 * Class TorrentFileList
 * @package TorrentPier\Legacy
 */
class TorrentFileList
{
    public $tor_decoded = [];
    public $files_ary = [
        '/' => []
    ];

    public $multiple = false;
    public $root_dir = '';
    public $files_html = '';

    /**
     * Constructor
     *
     * @param $decoded_file_contents
     */
    public function __construct($decoded_file_contents)
    {
        $this->tor_decoded = $decoded_file_contents;
    }

    /**
     * Fetching file list
     *
     * @return string
     */
    public function get_filelist()
    {

        $info = &$this->tor_decoded['info'];
        if (isset($info['meta version'], $info['file tree'])) { //v2
            if (($info['meta version']) === 2 && is_array($info['file tree'])) {
                return $this->fileTreeList($info['file tree'], $info['name'] ?? '', 15);
            }
        }

        $this->build_filelist_array();

        if ($this->multiple) {
            if (isset($this->files_ary['/'])) {
                if (!empty($this->files_ary['/'])) {
                    $this->files_ary = $this->files_ary + $this->files_ary['/'];
                }
                unset($this->files_ary['/']);
            }
            $filelist = array2html($this->files_ary);
            return "<div class=\"tor-root-dir\">{$this->root_dir}</div>$filelist";
        }

        return implode('', $this->files_ary['/']);
    }

    /**
     * Forming file list
     *
     * @return void
     */
    private function build_filelist_array()
    {

        $info = &$this->tor_decoded['info'];

        if (isset($info['name.utf-8'])) {
            $info['name'] =& $info['name.utf-8'];
        }

        if (isset($info['files']) && is_array($info['files'])) {
            $this->root_dir = isset($info['name']) ? clean_tor_dirname($info['name']) : '...';
            $this->multiple = true;

            foreach ($info['files'] as $f) {
                if (isset($f['path.utf-8'])) {
                    $f['path'] =& $f['path.utf-8'];
                }
                if (!isset($f['path']) || !is_array($f['path'])) {
                    continue;
                }
                // Exclude padding files
                if (isset($f['attr']) && $f['attr'] === 'p') {
                    continue;
                }

                $structure = array_deep($f['path'], 'clean_tor_dirname', timeout: 15);
                if (isset($structure['timeout'])) {
                    bb_die("Timeout, too many nested files/directories for file listing, aborting after \n{$structure['recs']} recursive calls.\nNesting level: " . count($info['files'], COUNT_RECURSIVE));
                }

                $length = isset($f['length']) ? (float)$f['length'] : 0;
                $subdir_count = count($f['path']) - 1;

                if ($subdir_count > 0) {
                    $name = array_pop($f['path']);
                    $cur_files_ary =& $this->files_ary;

                    for ($i = 0, $j = 1; $i < $subdir_count; $i++, $j++) {
                        $subdir = $f['path'][$i];

                        if (!isset($cur_files_ary[$subdir]) || !is_array($cur_files_ary[$subdir])) {
                            $cur_files_ary[$subdir] = [];
                        }
                        $cur_files_ary =& $cur_files_ary[$subdir];

                        if ($j === $subdir_count) {
                            if (is_string($cur_files_ary)) {
                                $GLOBALS['bnc_error'] = 1;
                                break;
                            }
                            $cur_files_ary[] = "$name <i>$length</i>";
                        }
                    }
                    asort($cur_files_ary);
                } else {
                    $name = $f['path'][0];
                    $this->files_ary['/'][] = "$name <i>$length</i>";
                    natsort($this->files_ary['/']);
                }
            }
        } else {
            $name = clean_tor_dirname($info['name']);
            $length = (float)$info['length'];
            $this->files_ary['/'][] = "$name <i>$length</i>";
            natsort($this->files_ary['/']);
        }
    }

    /**
     * File list generation for v2 supported torrents
     *
     * @param array $array
     * @param string $name
     * @return string
     */
    public function fileTreeList(array $array, string $name = '', int $timeout = 0, bool $child = false): string
    {
        $allItems = '';

        if ($timeout) {
            static $recursions = 0;
            if (time() > (time() + $timeout)) {
                bb_die("Timeout, too many nested files/directories for file listing, aborting after \n$recursions recursive calls.\nNesting level: " . count($this->tor_decoded['info']['file tree'], COUNT_RECURSIVE));
            }
            $recursions++;
        }

        foreach ($array as $key => $value) {
            $key = clean_tor_dirname($key);
            if (!isset($value[''])) {
                $html_v2 = $this->fileTreeList($value, timeout: $timeout, child: true);
                $allItems .= "<li><span class=\"b\">$key</span><ul>$html_v2</ul></li>";
            } else {
                $length = $value['']['length'];
                $sss = $value['']['pieces root'];
                $allItems .= "<li><span>$key<i>$length</i> <small class='small'>".bin2hex($sss)."</small></span></li>";
            }
        }

        if (!$child) {
            return '<div class="tor-root-dir">' . (empty($allItems) ? '' : htmlCHR($name)) . '</div><ul class="tree-root">' . $allItems . '</ul>';
        }

        return $allItems;
    }
		
}

function clean_tor_dirname($dirname)
{
 		return str_replace(['[', ']', '<', '>', "'"], ['&#91;', '&#93;', '&lt;', '&gt;', '&#039;'], $dirname);
}
function htmlCHR($txt, bool $double_encode = false, int $quote_style = ENT_QUOTES, ?string $charset = 'UTF-8'): string
{
    return (string)htmlspecialchars($txt ?? '', $quote_style, $charset, $double_encode);
}
function array_deep(&$var, $fn, $one_dimensional = false, $array_only = false, $timeout = false)
{
    if ($timeout) {
        static $recursions = 0;
        if (time() > (time() + $timeout)) {
            return [
                'timeout' => true,
                'recs' => $recursions
            ];
        }
        $recursions++;
    }
    if (is_array($var)) {
        foreach ($var as $k => $v) {
            if (is_array($v)) {
                if ($one_dimensional) {
                    unset($var[$k]);
                } elseif ($array_only) {
                    $var[$k] = $fn($v);
                } else {
                    array_deep($var[$k], $fn, timeout: $timeout);
                }
            } elseif (!$array_only) {
                $var[$k] = $fn($v);
            }
        }
    } elseif (!$array_only) {
        $var = $fn($var);
    }
}

function array2html($array, $ul = 'ul', $li = 'li')
{
    $out = '';
    $out = _array2html_rec($array, $ul, $li);
    return "<$ul class=\"tree-root\">{$out}</$ul>";
}

function _array2html_rec($array, $ul, $li)
{
    $out = '';
    foreach ($array as $k => $v) {
       if (\is_array($v)) {
           $out .= "<$li><span class=\"b\">$k</span><$ul>";
           $out .= _array2html_rec($v, $ul, $li);
           $out .= "</$ul></$li>";
       } else {
           $out .= "<$li><span>$v</span></$li>";
       }
    }
		return $out;
}