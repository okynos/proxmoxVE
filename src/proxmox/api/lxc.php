<?php
/**
 * @copyright 2019 Daniel Engelschalk <hello@mrkampf.com>
 */
namespace proxmox\api;

use proxmox\helper\connection;

class lxc
{
    private $httpClient,$apiURL,$CSRFPreventionToken,$ticket,$hostname,$cookie;

    public function __construct($httpClient,$apiURL,$CSRFPreventionToken,$ticket,$hostname,$cookie){
        $this->httpClient = $httpClient;
        $this->apiURL = $apiURL.'lxc/';
        $this->CSRFPreventionToken = $CSRFPreventionToken;
        $this->ticket = $ticket;
        $this->hostname = $hostname;
        $this->cookie = $cookie;
    }

    /**
     * @return mixed
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie,[]));
    }

    /**
     * @param $vmid
     * @return mixed|null
     */
    public function getLxc($vmid){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.$vmid,$this->cookie,[]));
    }

    /**
     * @param $vmid
     * @param $param
     * @return mixed|null
     */
    public function getConfig($vmid,$param){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.$vmid.'/config/',$this->cookie,$param));
    }

    /**
     * @param $vmid
     * @param $param
     * @return mixed|null
     */
    public function getFeature($vmid,$param){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.$vmid.'/feature/',$this->cookie,$param));
    }

    /**
     * @param $vmid
     * @param $param
     * @return mixed|null
     */
    public function postClone($vmid,$param){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.$vmid.'/clone/',$this->cookie,$param));
    }

    /**
     * @param $vmid
     * @param $param
     * @return mixed|null
     */
    public function postMigrate($vmid,$param){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.$vmid.'/migrate/',$this->cookie,$param));
    }

    /**
     * @param $vmid
     * @param $param
     * @return mixed|null
     */
    public function putConfig($vmid,$param){
        return connection::processHttpResponse(connection::putAPI($this->httpClient,$this->apiURL.$vmid.'/config/',$this->cookie,$param));
    }

    /**
     * @param $vmid
     * @return mixed|null
     */
    public function deleteLxc($vmid){
        return connection::processHttpResponse(connection::deleteAPI($this->httpClient,$this->apiURL.$vmid,$this->cookie,[]));
    }
}