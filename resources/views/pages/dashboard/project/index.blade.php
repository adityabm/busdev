@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Manajemen Projek</div>
            <div class="card-body">
                @if(Auth::user()->role != 'admin')
                <button type="button" class="btn btn-primary pull-right" onclick="window.eventHub.$emit('open-modal', 'form-project',null);">Ajukan Projek Baru</button>
                @endif
                <ajax-table
                    :url="'{{url('dashboard/project/get-data') }}'"
                    :oid="'data-project'"
                    :params="params"
                    :config="{
                        autoload: true,
                        show_all: false,
                        has_number: true,
                        has_entry_page: false,
                        has_pagination: true,
                        has_action: true,
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
                    :rowtemplate="'tr-data-project'"
                    @if(Auth::user()->role != 'admin')
                    :columns="{
                        project_name: 'Nama Projek',
                        status: 'Status Projek',
                        target: 'Target Projek',
                        timeline_start: 'Waktu Projek'
                    }" 
                    @else
                    :columns="{
                        project_name: 'Nama Projek',
                        status: 'Status Projek',
                        target: 'Target Projek',
                        user_id:'Pembuat Projek',
                        timeline_start: 'Waktu Projek'
                    }" 
                    @endif
                    >
                </ajax-table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modals')
<modal-form-project></modal-form-project>
@endsection