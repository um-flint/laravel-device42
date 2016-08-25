<?php

namespace UMFlint\Device42\Entities;

class Software extends BaseEntity
{
    /**
     * Gets software details.
     *
     * @link http://api.device42.com/#get-software-details
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $query
     * @return mixed
     */
    public function details($query = [])
    {
        return $this->device42->get('software_details', [
            'query' => $query,
        ]);
    }

    /**
     * Create/Update software details.
     *
     * @link http://api.device42.com/#create-update-software-details
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateDetails(array $data)
    {
        return $this->device42->post('software_details', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete software details.
     *
     * @link http://api.device42.com/#delete-software-detail
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function deleteDetails($id)
    {
        return $this->device42->delete("software_details/{$id}", [
            'form_params' => [
                'id' => $id,
            ],
        ]);
    }

    /**
     * Gets software component details.
     *
     * @link http://api.device42.com/#get-software-component-details
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $query
     * @return mixed
     */
    public function componentDetails($query = [])
    {
        return $this->device42->get('software', [
            'query' => $query,
        ]);
    }

    /**
     * Create/Update software components.
     *
     * @link http://api.device42.com/#create-update-software-components
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateComponent(array $data)
    {
        return $this->device42->post('software', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete software component.
     *
     * @link http://api.device42.com/#delete-software-component
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function deleteComponent($id)
    {
        return $this->device42->delete("software/{$id}", [
            'form_params' => [
                'id' => $id,
            ],
        ]);
    }

    /**
     * Gets software licence keys.
     *
     * @link http://api.device42.com/#get-software-license-keys
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $query
     * @return mixed
     */
    public function licenseKeys($query = [])
    {
        return $this->device42->get('software/licence_keys', [
            'query' => $query,
        ]);
    }

    /**
     * Create/Update software license keys.
     *
     * @link http://api.device42.com/#create-update-software-licenses
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateLicenceKey(array $data)
    {
        return $this->device42->post('software/license_keys', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete software license key.
     *
     * @link http://api.device42.com/#delete-software-license-keys
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function deleteLicenseKey($id)
    {
        return $this->device42->delete("software/license_keys/{$id}", [
            'form_params' => [
                'id' => $id,
            ],
        ]);
    }
}