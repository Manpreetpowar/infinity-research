@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-semibold text-uppercase mb-1">Total Enquiries</h6>
                            <h2 class="mb-0 fw-bold">{{ $enquiriesCount }}</h2>
                        </div>
                        <div class="stat-icon ms-auto">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mt-2">
        <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-dark"><i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>Recent
                Inquiries</h5>
            <a href="{{ route('admin.enquiries') }}" class="btn btn-sm btn-primary">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentEnquiries as $enquiry)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $enquiry->created_at->format('M d, Y') }}</span></td>
                                <td class="fw-semibold">{{ $enquiry->name }}</td>
                                <td><a href="mailto:{{ $enquiry->email }}"
                                        class="text-decoration-none">{{ $enquiry->email }}</a></td>
                                <td>{{ $enquiry->course ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No recent enquiries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection