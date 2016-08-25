<?php

namespace UMFlint\Device42\Entities;

class OperatingSystems extends BaseEntity
{
    /**
     * Gets all operating systems.
     *
     * @link http://api.device42.com/#get-all-operating-systems
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $query
     * @return mixed
     */
    public function all($query = [])
    {
        return $this->device42->get('operatingsystems', [
            'query' => $query,
        ]);
    }

    /**
     * Create/Update operating system.
     *
     * @link http://api.device42.com/#create-update-os
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateOperatingSystem(array $data)
    {
        return $this->device42->post('operatingsystems', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete operating system.
     *
     * @link http://api.device42.com/#delete-operating-system
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->device42->delete("operatingsystems/{$id}", [
            'id' => $id,
        ]);
    }

    /**
     * Get operating system by device.
     *
     * @link http://api.device42.com/#get-operating-systems-by-devices
     * @author Tyler Elton <telton@umflint.edu>
     * @param $query
     * @return mixed
     */
    public function getByDevice($query = [])
    {
        return $this->device42->get('device_os', [
            'query' => $query,
        ]);
    }

    /**
     * Create/Update operating system on device.
     *
     * @link http://api.device42.com/#create-update-operating-systems-on-devices
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateOnDevice(array $data)
    {
        return $this->device42->post('device_os', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete operating system on device.
     *
     * @link http://api.device42.com/#delete-operating-system-by-device
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function deleteOnDevice($id)
    {
        return $this->device42->delete("device_os/{$id}", [
            'device_os_id' => $id,
        ]);
    }
}