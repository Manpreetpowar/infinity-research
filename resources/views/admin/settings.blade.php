@extends('admin.layout')

@section('content')
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-sliders text-primary me-2"></i> Homepage JSON Settings
            </h2>
            <p class="text-muted mb-0">Manage the dynamic content map spanning the frontend layout.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            @foreach($cmsData as $sectionKey => $section)
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white py-3 border-bottom border-light">
                            <h5 class="m-0 font-weight-bold text-dark">{{ $section['title'] }}</h5>
                            <small class="text-muted">{{ $section['description'] ?? '' }}</small>
                        </div>
                        <div class="card-body">

                            @if(isset($section['fields']))
                                @foreach($section['fields'] as $fieldKey => $field)
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">{{ $field['label'] }}</label>

                                        @if($field['type'] === 'text')
                                            <input type="text" name="{{ $fieldKey }}" class="form-control"
                                                value="{{ old($fieldKey, $field['value']) }}">
                                        @elseif($field['type'] === 'textarea')
                                            <textarea name="{{ $fieldKey }}" class="form-control"
                                                rows="3">{{ old($fieldKey, $field['value']) }}</textarea>
                                        @elseif($field['type'] === 'image')
                                            <div class="mb-3">
                                                @if($field['value'])
                                                    <div class="p-2 border rounded bg-light mb-2 d-inline-block">
                                                        <img src="{{ $field['value'] }}" class="img-fluid"
                                                            style="max-height: 80px;" alt="{{ $field['label'] }}">
                                                    </div>
                                                @endif
                                                <input type="file" name="{{ $fieldKey }}" class="form-control"
                                                    accept="image/*">
                                                <div class="form-text">Upload a new logo image (PNG, JPG, SVG recommended).</div>
                                            </div>
                                        @elseif($field['type'] === 'array' || $field['type'] === 'array_simple')
                                            <div class="alert alert-secondary border-0 p-3 mb-0">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>JSON Configuration Array</strong>
                                                    <button type="button" class="btn btn-sm btn-outline-dark" onclick="formatJson(this)"
                                                        data-target="{{ $fieldKey }}"><i class="fa-solid fa-wand-magic-sparkles"></i>
                                                        Auto-Format</button>
                                                </div>
                                                <textarea name="{{ $fieldKey }}" id="{{ $fieldKey }}" class="form-control font-monospace"
                                                    rows="8">{{ old($fieldKey, is_array($field['value']) ? json_encode($field['value'], JSON_PRETTY_PRINT) : $field['value']) }}</textarea>
                                                @if($field['type'] === 'array' && isset($field['array_schema']))
                                                    <div class="mt-2 text-muted small"><strong>Schema:</strong> Array of objects with keys:
                                                        {{ implode(', ', array_keys($field['array_schema'])) }}</div>
                                                @endif
                                            </div>
                                        @endif

                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
            <button type="submit" class="btn btn-primary btn-lg shadow-lg px-5 border-0" style="background-color: #042475;">
                <i class="fa-solid fa-save me-2"></i> Save All Settings
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function formatJson(btn) {
            const targetId = btn.getAttribute('data-target');
            const textarea = document.getElementById(targetId);
            try {
                const currentVal = JSON.parse(textarea.value);
                textarea.value = JSON.stringify(currentVal, null, 4);

                // Flash success
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check text-success"></i> Formatted!';
                setTimeout(() => { btn.innerHTML = originalText; }, 2000);

            } catch (e) {
                alert('Invalid JSON! Please fix syntax errors before auto-formatting.');
            }
        }
    </script>
@endsection