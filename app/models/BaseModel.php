<?php
class BaseModel  extends \Phalcon\Mvc\Model
{
    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tag[]|Tag|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        // if parameters == null, create a paramters
        if (!isset($parameters)) {
            $parameters = [get_class() => 'all'];
        }
        
        if (!is_array($parameters)) {
            $parameters = [$parameters];
        }
        
        if (!isset($parameters['cache'])) {
            $parameters['cache'] = [
                "key" => self::_createKey($parameters),
                "lifetime" => 300
            ];
        }
        
        // Return the result in the cache
        return parent::find($parameters);
    }
    /**
     * Implement a method that returns a string key based
     * on the query parameters
     */
    protected static function _createKey($parameters)
    {
        $uniqueKey = array();
        
        foreach ($parameters as $key => $value) {
            if (is_scalar($value)) {
                $uniqueKey[] = $key . ':' . $value;
            } else {
                if (is_array($value)) {
                    $uniqueKey[] = $key . ':[' . self::_createKey($value) . ']';
                }
            }
        }
        
        return md5(join(',', $uniqueKey));
    }
    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tag|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        // if parameters == null, create a paramters
        if (!isset($parameters)) {
            $parameters = [get_class() => 'first'];
        }
        
        if (!is_array($parameters)) {
            $parameters = [$parameters];
        }
        
        if (!isset($parameters['cache'])) {
            $parameters['cache'] = [
                "key" => self::_createKey($parameters),
                "lifetime" => 300
            ];
            // Store the result in the memory cache
        }
        // Return the result in the cache
        return parent::findFirst($parameters);
    }
}

