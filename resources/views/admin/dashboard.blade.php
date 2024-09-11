@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Dashboard</h3>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">paid</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Total Pendaftar</span>
                                        <span class="widget-stats-amount">{{ $total_pendaftar }}</span>
                                        <span class="widget-stats-info">Total Pendaftar</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">person</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Total Diterima</span>
                                        <span class="widget-stats-amount">{{ $total_diterima }}</span>
                                        <span class="widget-stats-info">Total Diterima</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                        <i class="material-icons">keyboard_arrow_up</i> 12%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">file_download</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Downloads</span>
                                        <span class="widget-stats-amount">140,390</span>
                                        <span class="widget-stats-info">87 items downloaded</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                        <i class="material-icons">keyboard_arrow_up</i> 7%
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