<?php

namespace App\Controllers;

use App\Models\CustomerAccountModel;
use CodeIgniter\HTTP\RedirectResponse;

class Customers extends BaseController
{
    private CustomerAccountModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerAccountModel();
    }

    public function index(): string|RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $keyword = trim((string) $this->request->getGet('search'));
        $status = (string) $this->request->getGet('status');
        $type = (string) $this->request->getGet('type');
        $perPage = 10;

        return view('customers/index', [
            'title' => 'Customer Accounts - Puihaha Electric',
            'page' => 'customers',
            'accounts' => $this->customerModel->filteredList($keyword, $status, $type, $perPage),
            'pager' => $this->customerModel->pager,
            'total_accounts' => $this->customerModel->countAll(),
            'filtered_accounts' => $this->customerModel->countFiltered($keyword, $status, $type),
            'active_accounts' => $this->customerModel->getCountByStatus('active'),
            'inactive_accounts' => $this->customerModel->getCountByStatus('inactive'),
            'suspended_accounts' => $this->customerModel->getCountByStatus('suspended'),
            'search_keyword' => $keyword,
            'filter_status' => $status,
            'filter_type' => $type,
            'username' => session()->get('username'),
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function show(int $id): string|RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/customers')->with('error', 'Customer account not found.');
        }

        return view('customers/show', [
            'title' => 'Account Details - Puihaha Electric',
            'page' => 'customers',
            'account' => $account,
        ]);
    }

    public function new(): string|RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('customers/form', [
            'title' => 'Add Customer - Puihaha Electric',
            'page' => 'customers',
            'mode' => 'create',
            'account' => [],
            'validation' => session()->getFlashdata('validation'),
        ]);
    }

    public function create(): RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        if (! $this->validate($this->rules())) {
            session()->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $this->customerModel->insert($this->payload());

        return redirect()->to('/customers')->with('success', 'Customer account created.');
    }

    public function edit(int $id): string|RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/customers')->with('error', 'Customer account not found.');
        }

        return view('customers/form', [
            'title' => 'Edit Customer - Puihaha Electric',
            'page' => 'customers',
            'mode' => 'edit',
            'account' => $account,
            'validation' => session()->getFlashdata('validation'),
        ]);
    }

    public function update(int $id): RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (! $account) {
            return redirect()->to('/customers')->with('error', 'Customer account not found.');
        }

        $rules = $this->rules($id);

        if (! $this->validate($rules)) {
            session()->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $this->customerModel->update($id, $this->payload());

        return redirect()->to('/customers/' . $id)->with('success', 'Customer account updated.');
    }

    public function delete(int $id): RedirectResponse
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $this->customerModel->delete($id);

        return redirect()->to('/customers')->with('success', 'Customer account deleted.');
    }

    private function requireLogin(): ?RedirectResponse
    {
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login')->with('error', 'You have been logged out. Please log in again.');
        }

        return null;
    }

    private function rules(?int $id = null): array
    {
        $accountRule = 'required|max_length[50]|is_unique[customer_accounts.account_number]';

        if ($id !== null) {
            $accountRule = 'required|max_length[50]|is_unique[customer_accounts.account_number,id,' . $id . ']';
        }

        return [
            'account_number' => $accountRule,
            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]',
        ];
    }

    private function payload(): array
    {
        return [
            'account_number' => $this->request->getPost('account_number'),
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'meter_number' => $this->request->getPost('meter_number'),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status'),
        ];
    }
}
