<?php
/**
 * @author     Zhao
 * @Created  2020/05/18
 * 文件管理类
 */
namespace Common\Util;

class File {

	public $path;

	public function  __construct($path = "") {
		$this->path = $path;
	}

	/**
	 * 获取目录下的文件列表及信息
	 * @param string $path
	 * @return array
	 */
	public function fileList($path = "") {
		$path = $path ? $path : $this->path;
		if (!is_dir($path)) {
			die("\"{$path}\" is not exists or invalid!");
		}
		//打开目录
		$dir = opendir($path);
		//遍历目录
		$list  = array();
		$lists = array();
		while (false !== ($file = readdir($dir))) {
			if ($file == "." | $file == "..") {
				continue;
			}
			$file          = rtrim($path, "/") . "/" . $file;
			$list["name"]  = basename($file);
			$list["size"]  = filesize($file);
			$list["ctime"] = filectime($file);
			$list["mtime"] = filemtime($file);
			$list['dir']   = is_dir($file) ? true : false;
			$lists[]       = $list;
		}
		closedir($dir);
		return $lists;
	}

	/**
	 * 获取文件夹大小
	 * @param $path
	 * @return int
	 */
	public function  getDirSize($path = "") {
		$path = $path ? $path : $this->path;
		if (!is_dir($path)) {
			die("\"{$path}\" is not exists or invalid!");
		}
		//打开目录
		$dir = opendir($path);
		//读取目录
		$sum = 0;
		while (false !== ($file = readdir($dir))) {
			if ($file == "." || $file == "..") {
				continue;
			}
			$file = rtrim($path, "/") . "/" . $file;
			if (is_file($file)) $sum += filesize($file);
			if (is_dir($file)) $sum += $this->getDirSize($file);
		}
		//销毁资源
		closeDir($dir);
		//返回结果
		return $sum;
	}

	/**
	 * 删除文件夹
	 * @param $path
	 * @return bool
	 */
	public function delDir($path = "") {
		$path = $path ? $path : $this->path;
		if (!is_dir($path)) {
			die("\"{$path}\" is not exists or invalid!");
		}

		//打开目录
		$dir = opendir($path);
		//读取目录
		while (false !== ($file = readdir($dir))) {
			if ($file == '.' || $file == "..") {
				continue;
			}
			$file = rtrim($path, "/") . "./" . $file;
			if (is_file($file)) unlink($file);
			if (is_dir($file)) $this->getDirSize($file);
		}

		//关闭资源
		closedir($dir);
		//删除文件夹
		return rmdir($path);
	}

	/**
	 * 递归删除目录
	 * @param $path
	 * @return bool
	 */
	public function rmdirs($path = "") {
		$dir = $path ? $path : $this->path;
		if (!is_dir($dir) || rmdir($dir)) return TRUE;
		if ($dir_handle = opendir($dir)) {
			while ($filename = readdir($dir_handle)) {
				if ($filename != '.' && $filename != '..') {
					$subFile = $dir . '/' . $filename;
				}
				is_dir($subFile) ? self::rmdirs($subFile) : unlink($subFile);
			}
			closedir($dir_handle);
			return rmdir($dir);
		}
	}

	/**
	 * 文件复制
	 * @param        $dpath 目标目录
	 * @param string $path  源目录
	 * @return bool
	 */
	public function  dirCopy($dpath, $path = "") {
		$path = $path ? $path : $this->path;
		//目录检测
		if (!is_dir($path)) {
			die("\"{$path}\" is not exists or invalid!");
		}
		if (!is_dir($dpath)) {
			mkdir($dpath, 0777, true) or die("\"{$dpath}\" is not exists or invalid!");
		}

		//打开源目录
		$sdir = opendir($path);

		//遍历源目录
		while (false !== ($file = readdir($sdir))) {
			if ($file == '.' || $file == "..") {
				continue;
			}
			$sfile = rtrim($path, "/") . "/" . $file;
			$dfile = rtrim($dpath, "/") . "/" . $file;
			if (is_file($sfile)) copy($sfile, $dfile);
			if (is_dir($sfile)) $this->dirCopy($dfile, $sfile);
		}
		//销毁资源
		closedir($sdir);
		return true;
	}

	/**
	 * 获取文件内容
	 * @param $path
	 * @return string
	 */
	public function getContents($path) {
		$list = "";
		if (!is_file($path) || !file_exists($path)) {
			return false;
		}
		$file = fopen($path, "r");
		while ($data = fread($file, 1024)) {
			$list .= $data;
		}
		fclose($file);
		return $list;
	}

	/**
	 * 修改文件内容
	 * @param $path        要修改的文件名
	 * @param $str         要写入的内容
	 * @param $name        修改后的文件名
	 * @return bool|int
	 */
	public function  updateContents($path, $str, $name) {
		if (!is_file($path) || !file_exists($path)) {
			return false;
		}
		$file   = fopen($path, "w"); //打开文件
		$result = fwrite($file, $str);//写入文件
		fclose($file);
		//修改文件名
		if (basename($path) !== $name) {
			$name = dirname($path) . "/" . $name;
			if (!file_exists($name)) {
				rename($path, $name);
			} else {
				return false;
			}
		}
		return $result;
	}
}
