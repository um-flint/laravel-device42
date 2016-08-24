<?php

namespace UMFlint\Device42\Entities;

class Customers extends BaseEntity
{
    /**
     * Get all customers.
     *
     * @link http://api.device42.com/#get-all-customers
     * @author Tyler Elton <telton@umflint.edu>
     * @return mixed
     */
    public function all()
    {
        return $this->device42->get('customers');
    }

    /**
     * Create/Update a customer.
     *
     * @link http://api.device42.com/#create-update-customers
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdate(array $data)
    {
        return $this->device42->post('customers', [
            'form_params' => $data,
        ]);
    }

    /**
     * Delete customer.
     *
     * @link http://api.device42.com/#delete-customer
     * @author Tyler Elton <telton@umflint.edu>
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->device42->delete("customers/{$id}", [
            'form_params' => [
                'id' => $id,
            ],
        ]);
    }

    /**
     * Create/Update customer contacts.
     *
     * @link http://api.device42.com/#create-update-customer-contacts
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateContacts(array $data)
    {
        return $this->device42->post('customers/contacts', [
            'form_params' => $data,
        ]);
    }

    /**
     * Create/Update custom fields.
     *
     * @link http://api.device42.com/#custom-fields188
     * @author Tyler Elton <telton@umflint.edu>
     * @param array $data
     * @return mixed
     */
    public function createOrUpdateFields(array $data)
    {
        return $this->device42->put('custom_fields/customer', [
            'form_params' => $data,
        ]);
    }
}