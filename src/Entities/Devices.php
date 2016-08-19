<?php

namespace UMFlint\Device42\Entities;

class Devices extends BaseEntity
{
    /**
     * Get all devices with brief output.
     *
     * @link   http://api.device42.com/#get-all-devices-with-brief-output
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $query
     * @param null  $limit
     * @param null  $offset
     * @return mixed
     */
    public function all($query = [], $limit = null, $offset = null)
    {
        if (!is_null($limit)) {
            $query['limit'] = $limit;
        }

        if (!is_null($offset)) {
            $query['offset'] = $offset;
        }

        return $this->device42->get('devices', [
            'query' => $query,
        ]);;
    }

    /**
     * Get all devices with detailed output.
     *
     * @link   http://api.device42.com/#get-all-devices-with-detailed-output-added-in-v6-3-4
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $query
     * @param null  $limit
     * @param null  $offset
     * @return mixed
     */
    public function allDetailed($query = [], $limit = null, $offset = null)
    {
        if (!is_null($limit)) {
            $query['limit'] = $limit;
        }

        if (!is_null($offset)) {
            $query['offset'] = $offset;
        }

        return $this->device42->get('devices/all', [
            'query' => $query,
        ]);;
    }

    /**
     * Get device by device id.
     *
     * @link   http://api.device42.com/#get-device-by-device-id
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param      $id
     * @param bool $follow
     * @return mixed
     */
    public function find($id, $follow = false)
    {
        $query = [];

        if ($follow == true) {
            $query['follow'] = 'yes';
        }

        return $this->device42->get("devices/id/{$id}", [
            'query' => $query,
        ]);
    }

    /**
     * Get devices by customer id.
     *
     * @link   http://api.device42.com/#get-devices-by-customer-id
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param      $customerId
     * @param null $include_cols
     * @return mixed
     */
    public function findByCustomer($customerId, $include_cols = null)
    {
        $query = [];

        if (!is_null($include_cols)) {
            $query['include_cols'] = $include_cols;
        }

        return $this->device42->get("devices/customer_id/{$customerId}", [
            'query' => $query,
        ]);
    }

    /**
     * Get device by device name.
     *
     * @link   http://api.device42.com/#get-device-by-device-name
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param      $name
     * @param null $include_cols
     * @param bool $follow
     * @return mixed
     */
    public function findByName($name, $include_cols = null, $follow = false)
    {
        $query = [];

        if (!is_null($include_cols)) {
            $query['include_cols'] = $include_cols;
        }

        if ($follow == true) {
            $query['follow'] = 'yes';
        }

        return $this->device42->get("devices/name/{$name}", [
            'query' => $query,
        ]);
    }

    /**
     * Get device by device serial number.
     *
     * @link   http://api.device42.com/#get-device-by-device-serial-number
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param      $serialNumber
     * @param null $include_cols
     * @return mixed
     */
    public function findBySerialNumber($serialNumber, $include_cols = null)
    {
        $query = [];

        if (!is_null($include_cols)) {
            $query['include_cols'] = $include_cols;
        }

        return $this->device42->get("devices/serial/{$serialNumber}", [
            'query' => $query,
        ]);
    }

    /**
     * Get device by device asset number.
     *
     * @link   http://api.device42.com/#get-device-by-device-asset-number
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param      $assetNumber
     * @param null $include_cols
     * @return mixed
     */
    public function findByAssetNumber($assetNumber, $include_cols = null)
    {
        $query = [];

        if (!is_null($include_cols)) {
            $query['include_cols'] = $include_cols;
        }

        return $this->device42->get("devices/asset/{$assetNumber}", [
            'query' => $query,
        ]);
    }

    /**
     * Create/Update device by name.
     *
     * @link   http://api.device42.com/#create-update-device-by-name
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateByName(array $data)
    {
        return $this->device42->post('devices', [
            'form_params' => $data,
        ]);
    }

    /**
     * Create/Update Multi-Serial Device by name.
     *
     * @link   http://api.device42.com/#create-update-multi-serial-device-by-name
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateMultiSerialByName(array $data)
    {
        return $this->device42->post('multiserial', [
            'form_params' => $data,
        ]);
    }

    /**
     * Create/Update multi-node device by name.
     *
     * @link   http://api.device42.com/#create-update-multi-node-device-by-name
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateMultiNodeByName(array $data)
    {
        return $this->device42->post('multinodes', [
            'form_params' => $data,
        ]);
    }

    /**
     * Update device by name, ID, serial or asset.
     *
     * @link   http://api.device42.com/#update-device-by-name-id-serial-or-asset
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function updateByNameOrIdOrSerialOrAsset(array $data)
    {
        return $this->device42->put('device', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete device.
     *
     * @link   http://api.device42.com/#delete-device
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->device42->delete("devices/{$id}", [
            'form_params' => [
                'id' => $id,
            ],
        ]);
    }

    /**
     * Create/Update customer fields.
     *
     * @link   http://api.device42.com/#create-update-custom-fields
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateFields(array $data)
    {
        return $this->device42->put('device/custom_field', [
            'form_params' => $data,
        ]);
    }

    /**
     * Get device URLs.
     *
     * @link   http://api.device42.com/#get-device-urls
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param $name
     * @return mixed
     */
    public function getUrls($name = null)
    {
        $query = [];

        if (!is_null($name)) {
            $query['device'] = $name;
        }

        return $this->device42->get('device/url', [
            'query' => $query,
        ]);
    }

    /**
     * Add URL to device.
     *
     * @link   http://api.device42.com/#add-url-to-device
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function addUrl(array $data)
    {
        return $this->device42->post('device/url', [
            'form_params' => $data,
        ]);
    }

    /**
     * Update device URL.
     *
     * @link   http://api.device42.com/#update-device-url
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function updateUrl(array $data)
    {
        return $this->device42->put('device/url', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete a device URL.
     *
     * @link   http://api.device42.com/#delete-a-device-url
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function deleteUrl($id)
    {
        return $this->device42->delete("device/url/{$id}");
    }

    /**
     * Add/Update a device in a rack.
     *
     * @link   http://api.device42.com/#add-update-a-device-in-a-rack
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function addOrUpdateInRack(array $data)
    {
        return $this->device42->post('device/rack', [
            'form_params' => $data,
        ]);
    }

    /**
     * Remove/Delete a device from a rack.
     *
     * @link   http://api.device42.com/#remove-delete-a-device-from-a-rack
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param $deviceId
     * @return mixed
     */
    public function deleteFromRack($deviceId)
    {
        return $this->device42->delete("device/rack/{$deviceId}");
    }
}