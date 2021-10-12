<?php

namespace MarcosOrozco\PrevalenceSearchData\App;

class Url
{
    /**
     * @var array
     */
    private $arrayValues;

    private static $data = [];

    /**
     * UrlTO constructor.
     * @param array $arrayValues
     */
    public function __construct(array $arrayValues = [])
    {
        $this->arrayValues = $arrayValues;
    }

    public static function setPrevalecenceData(array $arrayData)
    {
        self::$data = $arrayData;
    }

    public static function getPrevalecenceData($key = '')
    {
        if ($key)
            return self::$data[$key] ?? null;
        return self::$data;
    }

    public static function generateArray($array = [], array $except = [], $removeString = '')
    {
        if (!is_array($array))
            $array = [$array];
        $values = self::$data;
        $arrayValues = array_merge($array, $values);
        $result = [];
        foreach ($arrayValues as $key=>$value) {
            if (!in_array($key, $except)) {
                $result[str_replace($removeString, '', $key)] = $value;
            }
        }
        return $result;
    }

    /**
     * @param array $array
     * @param array $except
     * @param string $removeString
     * @return array
     */
    public function toArray($array = [], array $except = [], $removeString = '')
    {
        if (!is_array($array))
            $array = [$array];
        $arrayValues = array_merge($array, $this->arrayValues);
        $result = [];
        foreach ($arrayValues as $key=>$value) {
            if (!in_array($key, $except)) {
                $result[str_replace($removeString, '', $key)]=$value;
            }
        }
        return $result;
    }

    /**
     * @param array $except
     * @param string $removeString
     * @return string
     */
    public static function generateInput(array $except = [], $removeString = '')
    {
        $arrayValues = self::$data;
        $result = '';
        foreach ($arrayValues as $key=>$value) {
            if (!in_array($key, $except)) {
                $result.='<input type="hidden" name="'
                    .str_replace($removeString, '', $key)
                    .'" value="'.$value.'"/>';
            }
        }
        return $result;
    }

    /**
     * @param array $except
     * @param string $removeString
     * @return string
     */
    public function toInput(array $except = [], $removeString = '')
    {
        $arrayValues = $this->arrayValues;
        $result = '';
        foreach ($arrayValues as $key=>$value) {
            if (!in_array($key, $except)) {
                $result.='<input type="hidden" name="'
                    .str_replace($removeString, '', $key)
                    .'" value="'.$value.'"/>';
            }
        }
        return $result;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->arrayValues[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->arrayValues[$name] ?? null;
    }
}