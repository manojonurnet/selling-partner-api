<?php
/**
 * Configuration
 * PHP version 5
 *
 * @category Class
 * @package  Evers\SellingPartnerApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Selling Partner API for Uploads
 *
 * The Selling Partner API for Uploads provides operations that support uploading files.
 *
 * OpenAPI spec version: 2020-11-01
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.13
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Evers\SellingPartnerApi;

use Evers\SellingPartnerApi\Authentication;

/**
 * Configuration Class Doc Comment
 * PHP version 5
 *
 * @category Class
 * @package  Evers\SellingPartnerApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Configuration
{
    private static $defaultConfiguration;
    private static $defaultAuthentication;

    /**
     * The host
     *
     * @var string
     */
    protected $host = 'https://sellingpartnerapi-na.amazon.com';

    /**
     * User agent of the HTTP request, set to "PHP-Swagger" by default
     *
     * @var string
     */
    protected $userAgent = 'SellingPartnerAPI/1.0 (Language=PHP)';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $tempFolderPath;

    /**
     * Constructor
     */
    public function __construct(?array $lwaAuthInfo = null)
    {
        $this->lwaAuthInfo = $lwaAuthInfo;
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Gets the stripped-down host (no protocol or trailing slash)
     *
     * @return string Host
     */
    public function getBareHost()
    {
        $host = $this->getHost();
        $noProtocol = preg_replace("/.+\:\/\//", " ", $host);
        return trim($noProtocol, "/");
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        if (!is_string($userAgent)) {
            throw new \InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return $this
     */
    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration()
    {
        if (self::$defaultConfiguration === null) {
            $config = new Configuration();
            $auth = self::getDefaultAuthentication();

            loadDotenv();

            $config->setHost($_ENV["SPAPI_ENDPOINT"]);
            self::$defaultConfiguration = $config;
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the detault configuration instance
     *
     * @param Configuration $config An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config)
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the default authentication instance
     *
     * @return Authentication
     */
    public static function getDefaultAuthentication()
    {
        if (self::$defaultAuthentication === null) {
            self::setDefaultAuthentication();
        }
        return self::$defaultAuthentication;
    }

    /**
     * Sets the default authentication instance
     *
     * @param Authentication $auth An instance of the Authentication class
     *
     * @return void
     */
    public static function setDefaultAuthentication($auth = null)
    {
        if ($auth !== null) {
            self::$defaultAuthentication = $auth;
        } else if (self::$defaultAuthentication === null) {
            $auth = new Authentication();
            if ($this->lwaAuthInfo !== null) {
                $refreshToken = $this->lwaAuthInfo["refreshToken"] ?? null;
                $accessToken = $this->lwaAuthInfo["accessToken"] ?? null;
                $accessTokenExpiration = $this->lwaAuthInfo["accessTokenExpiration"] ?? null;
                $auth = new Authentication($refreshToken, $accessToken, $accessTokenExpiration);
            }
            self::$defaultAuthentication = $auth;
        }
        return self::$defaultAuthentication;
    }

    /**
     * Get a \DateTime object representing the current time, in the correct timezone for use
     * with the Selling Partner API.
     *
     * @return \DateTime The current time
     */
    public function getDateTimeForApi()
    {
        $auth = self::getDefaultAuthentication();
        return $auth->datetimeForApi();
    }

    /**
     * Sign a request to the Selling Partner API using the AWS Signature V4 protocol.
     *
     * @param \GuzzleHttp\Psr7\Request $request The request to sign
     *
     * @return \GuzzleHttp\Psr7\Request The signed request
     */
    public function signRequest($request)
    {
        $auth = self::getDefaultAuthentication();
        return $auth->signRequest($request);
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport()
    {
        $report  = 'PHP SDK (Evers\SellingPartnerApi) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: 2020-11-01' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param  string $apiKeyIdentifier name of apikey
     *
     * @return string API key with the prefix
     */
    public function getApiKeyWithPrefix($apiKeyIdentifier)
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }
}