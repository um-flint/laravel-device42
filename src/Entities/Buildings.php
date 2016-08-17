<?php

namespace UMFlint\Device42\Entities;

class Buildings extends BaseEntity
{
    /**
     * Get all the buildings.
     *
     * @link    http://api.device42.com/#get-all-buildings
     * @author  Donald Wilcox <dowilcox@umflint.edu>
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function all($limit = null, $offset = null)
    {
        $query = [];

        if (!is_null($limit)) {
            $query['limit'] = $limit;
        }

        if (!is_null($offset)) {
            $query['offset'] = $offset;
        }

        $data = $this->device42->get('buildings', [
            'query' => $query,
        ]);

        return $data;
    }

    /**
     * Create or update a building.
     *
     * @link    http://api.device42.com/#create-update-building
     * @author  Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return array|mixed
     */
    public function createOrUpdate(array $data)
    {
        return $this->device42->post('buildings', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete a building
     *
     * @link   http://api.device42.com/#delete-building
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->device42->delete("buildings/{$id}", [
            'form_params' => [
                'id' => $id,
            ],
        ]);
    }

    /**
     * Create or update customer fields for buildings.
     *
     * @link   http://api.device42.com/#custom-fields
     * @author Donald Wilcox <dowilcox@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateFields(array $data)
    {
        return $this->device42->put('custom_fields/building', [
            'form_params' => $data,
        ]);
    }
}