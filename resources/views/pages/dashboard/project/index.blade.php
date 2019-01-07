@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Project Management</div>
            <div class="card-body">
                <button type="button" class="btn btn-primary pull-right" onclick="window.eventHub.$emit('open-modal', 'form-project',null);">Post New Project</button>
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
                    :columns="{
                        project_name: 'Project Name',
                        status: 'Project Status',
                        target: 'Project Target',
                        timeline_start: 'Project Timeline'
                    }" >
                </ajax-table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modals')
<modal-form-project></modal-form-project>
@endsection