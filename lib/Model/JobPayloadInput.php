<?php
/**
 * JobPayloadInput
 *
 * PHP version 5
 *
 * @category Class
 * @package  Autodesk\Forge\Client
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Forge SDK
 *
 * The Forge Platform contains an expanding collection of web service components that can be used with Autodesk cloud-based products or your own technologies. Take advantage of Autodesk’s expertise in design and engineering.
 *
 * OpenAPI spec version: 0.1.0
 * Contact: forge.help@autodesk.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Autodesk\Forge\Client\Model;

use \ArrayAccess;

/**
 * JobPayloadInput Class Doc Comment
 *
 * @category    Class
 * @description Group of inputs
 * @package     Autodesk\Forge\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class JobPayloadInput implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     * @var string
     */
    protected static $swaggerModelName = 'jobPayload_input';

    /**
     * Array of property to type mappings. Used for (de)serialization
     * @var string[]
     */
    protected static $swaggerTypes = [
        'urn' => 'string',
        'compressed_urn' => 'bool',
        'root_filename' => 'string',
    ];

    /**
     * @return \string[]
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'urn' => 'urn',
        'compressed_urn' => 'compressedUrn',
        'root_filename' => 'rootFilename',
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'urn' => 'setUrn',
        'compressed_urn' => 'setCompressedUrn',
        'root_filename' => 'setRootFilename',
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'urn' => 'getUrn',
        'compressed_urn' => 'getCompressedUrn',
        'root_filename' => 'getRootFilename',
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['urn'] = isset($data['urn']) ? $data['urn'] : null;
        $this->container['compressed_urn'] = isset($data['compressed_urn']) ? $data['compressed_urn'] : false;
        $this->container['root_filename'] = isset($data['root_filename']) ? $data['root_filename'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['urn'] === null) {
            $invalid_properties[] = "'urn' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['urn'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets urn
     * @return string
     */
    public function getUrn()
    {
        return $this->container['urn'];
    }

    /**
     * Sets urn
     * @param string $urn The design URN; returned when uploading the file to Forge The URN needs to be [Base64 (URL Safe) encoded](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/job-POST/#id3).
     * @return $this
     */
    public function setUrn($urn)
    {
        $this->container['urn'] = $urn;

        return $this;
    }

    /**
     * Gets compressed_urn
     * @return bool
     */
    public function getCompressedUrn()
    {
        return $this->container['compressed_urn'];
    }

    /**
     * Sets compressed_urn
     * @param bool $compressed_urn Set this to `true` if the source file is compressed. If set to `true`, you need to define the `rootFilename`.
     * @return $this
     */
    public function setCompressedUrn($compressed_urn)
    {
        $this->container['compressed_urn'] = $compressed_urn;

        return $this;
    }

    /**
     * Gets root_filename
     * @return string
     */
    public function getRootFilename()
    {
        return $this->container['root_filename'];
    }

    /**
     * Sets root_filename
     * @param string $root_filename The root filename of the compressed file. Mandatory if the `compressedUrn` is set to `true`.
     * @return $this
     */
    public function setRootFilename($root_filename)
    {
        $this->container['root_filename'] = $root_filename;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Autodesk\Forge\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Autodesk\Forge\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


