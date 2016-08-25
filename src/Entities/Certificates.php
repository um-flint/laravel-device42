<?php

namespace UMFlint\Device42\Entities;

class Certificates extends BaseEntity
{
    /**
     * Gets a certificate based on its ID.
     *
     * @link http://api.device42.com/#get-certificates
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function getCertificate($id)
    {
        return $this->device42->get('certificates', [
            'query' => $id,
        ]);
    }

    /**
     * Create/Update certificate.
     *
     * @link http://api.device42.com/#create-update-certificates
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateCertificate(array $data)
    {
        return $this->device42->post('certificates', [
            'form_params' => $data,
        ]);
    }
}