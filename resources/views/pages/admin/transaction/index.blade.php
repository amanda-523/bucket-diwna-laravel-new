@extends('layouts.admin')

@section('title')
Admin Transaction Page
@endsection

@section('content')
<div class="section-content section-dashboard" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaksi</h2>
            <p class="dashboard-subtitle">
                Ini adalah list transaksi Bucket Diwna
            </p>
            <hr />
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-dashboard">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Total</th>
                                            <th>Status Transaksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'total_price', name: 'total_price' },
                { data: 'transaction_status', name: 'transaction_status' },
                {
                    data: 'toggle_status',
                    name: 'toggle_status',
                    orderable: false,
                    searchable: false,
                    width: '15%',
                },
            ]
        })
</script>
<script>
    $(document).on('change', '.toggle-status', function() {
        const transactionId = $(this).data('id');
        const status = $(this).is(':checked') ? 'SUCCESS' : 'PENDING';
        
        $.ajax({
            url: `/admin/transaction/toggle-status/${transactionId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status
            },
            success: function(response) {
                if(response.success) {
                    alert('Status updated successfully');
                } else {
                    alert('Failed to update status');
                }
            }
        });
    });
</script>
@endpush