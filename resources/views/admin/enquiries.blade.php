@extends('admin.layout')

@section('content')
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-dark"><i class="fa-solid fa-users me-2 text-primary"></i>All Enquiries Log
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="enquiriesTable" class="table table-hover table-bordered align-middle w-100">
                    <thead class="table-light">
                        <tr>
                            <th>Date & Time</th>
                            <th>Applicant Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Selected Course</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $enq)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $enq->created_at->format('Y-m-d H:i') }}</span></td>
                                <td class="fw-semibold">{{ $enq->name }}</td>
                                <td><a href="tel:{{ $enq->phone }}" class="text-decoration-none text-dark"><i
                                            class="fa-solid fa-phone fa-xs text-muted me-1"></i>{{ $enq->phone }}</a></td>
                                <td><a href="mailto:{{ $enq->email }}" class="text-decoration-none">{{ $enq->email }}</a></td>
                                <td>
                                    @if($enq->course)
                                        <span class="badge bg-info text-dark rounded-pill">{{ $enq->course }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($enq->message)
                                        <button type="button" class="btn btn-sm btn-light border" data-bs-toggle="popover"
                                            title="Message from {{ $enq->name }}" data-bs-content="{{ $enq->message }}">
                                            <i class="fa-solid fa-comment-dots text-primary"></i> Read
                                        </button>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#enquiriesTable').DataTable({
                "order": [[0, "desc"]],
                "pageLength": 25,
                "language": {
                    "search": "Filter records:",
                    "lengthMenu": "Display _MENU_ entries per page"
                },
                "dom": "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                drawCallback: function () {
                    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                        return new bootstrap.Popover(popoverTriggerEl)
                    })
                }
            });
        });
    </script>
@endsection