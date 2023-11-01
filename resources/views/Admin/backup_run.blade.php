@extends('layouts.app')

@section('content')
    <style>
        /* CSS for the loader overlay */
        #loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-eye"></i>Show Backup Details</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
        <div id="loader-overlay">
            <div class="loader"></div>
        </div>
        <div class="row card">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: red">Backup Details:</strong><br>
                    @foreach($output as $index => $outputs)
                        <label class="badge badge-info">{{$outputs}}</label>
                        @if(($index + 1) % 2 == 0)
                            <br>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection
@push('page_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>

    <script>
        // Wait for the page to fully load
        window.addEventListener('load', function () {
            // Hide the loader overlay
            document.getElementById('loader-overlay').style.display = 'none';
        });
    </script>

@endpush
