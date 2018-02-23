<?php
/**
 * Created by PhpStorm.
 * User: SilverKron
 * Date: 23/02/18
 */

namespace CsvBuilder;

class CsvBuilder
{
    /**
     * The default file path
     *
     * @var string
     */
    private $filePath;

    /**
     * The default file name
     *
     * @var string
     */
    private $fileName;

    /**
     * First file row with all columns name
     *
     * @var string
     */
    private $titles;

    /**
     * First file rows
     *
     * @var string
     */
    private $rows;

    /**
     * Character for comma escape
     *
     * @var string
     */
    private $charForEscape = ' ';

    /**
     * CsvBuilder constructor.
     * Set default values
     */
    public function __construct()
    {
        $this->fileName = 'csv_' . date('YmdHis') . '.csv';
        $this->filePath = '/tmp/';
    }

    /**
     * @param string $param
     * @return string
     */
    private function escape($param)
    {
        return str_replace(',', $this->charForEscape, $param);
    }

    /**
     * @param string $name
     */
    public function setFileName($name)
    {
        $this->fileName = $name;
    }

    /**
     * @param string $path
     */
    public function setFilePath($path)
    {
        $path = rtrim($path, '/') . '/';
        $this->filePath = $path;
    }

    /**
     * @param array $titles
     */
    public function setTitles($titles)
    {
        $this->titles = array();
        foreach ($titles as &$title) {
            $title = $this->escape($title);
        }

        $this->titles = implode(',', $titles) . PHP_EOL;
    }

    public function clearRows()
    {
        $this->rows = array();
    }

    /**
     * @param array $row
     */
    public function addRow($row)
    {
        foreach ($row as &$column) {
            $column = $this->escape($column);
        }

        $this->rows .= implode(',', $row) . PHP_EOL;
    }

    /**
     * @param string $char
     * @throws \Exception
     */
    public function setCharForEscape($char)
    {
        if ($char == ',') {
            throw new \Exception('You can not use comma for global escape');
        }

        $this->charForEscape = $char;
    }

    public function create()
    {
        $path = $this->filePath . $this->fileName;

        $file = fopen($path, 'w');
        fwrite($file, $this->titles);
        fwrite($file, $this->rows);
        fclose($file);

        return $path;
    }

    public function download()
    {
        $path = $this->filePath . $this->fileName;

        if (file_exists($path)) {
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: Binary');
            header('Content-Disposition: attachment; filename=' . basename($path));
            header('Content-Length: ' . filesize($path));
            @readfile($path);
            return true;
        }
        return false;
    }
}
