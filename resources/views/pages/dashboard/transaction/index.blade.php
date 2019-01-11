@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Riwayat Transaksi</div>
            <div class="card-body">
                <ajax-table
                    :url="'{{url('dashboard/transaction/get-data') }}'"
                    :oid="'data-transaction'"
                    :params="params"
                    :config="{
                        autoload: true,
                        show_all: false,
                        has_number: true,
                        has_entry_page: false,
                        has_pagination: true,
                        has_action: false,
                        has_search_input: true,
                        has_search_header: false,
                        custom_header: '',
                        default_sort: 'updated_at',
                        default_sort_dir: 'desc',
                        custom_empty_page: false,
                        search_placeholder: 'Search',
                        class: {
                          table: ['table-sm'],
                          wrapper: ['table-responsive'],
                        }
                    }"
                    :rowparams="{}"
                    :rowtemplate="'tr-data-transaction'"
                    :columns="{
                        created_at: 'Tanggal Transaksi',
                        project_id: 'Nama Projek',
                        invest: 'Jumlah Investasi',
                        status: 'Status'
                    }" 
                    >
                </ajax-table>
            </div>
        </div>
    </div>
</div>

@endsection