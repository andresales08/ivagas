@extends('layouts.ivagas')

@section('title', 'Página Inicial')

@section('content')
<div class="container-fluid p-2">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="d-flex text-center">
                        <div class="flex-grow-1">
                            <p class="mb-2"><strong>Empresas</strong></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <form id="empresas-datatable-filter">
                                <div>
                                    <label for="filter-nome">Filtrar por Nome:</label>
                                    <input type="text" id="filter-nome" />
                            
                                    <label for="filter-cnpj">Filtrar por CNPJ:</label>
                                    <input type="text" id="filter-cnpj" />
                                </div>
                            </form>
                            
                            <table id="empresas-datatable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Npme</th>
                                        <th>CNPJ</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                            </table>

                            <div class="d-flex align-items-start mt-3">
                                <div class="flex-grow-1">
                                    <p class="text-muted">
                                        <strong>Stacie Hall</strong>: Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices
                                        mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            empresasDatatable()



        });

        function empresasDatatable(){
            $('#empresas-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/empresas/datatable",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'cnpj', name: 'cnpj' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json',
                },
            });
        }

    </script>
@endpush