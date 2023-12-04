@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">

    {{-- Content Header --}}
    @hasSection('content_header')
        <div class="content-header">
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <h5 class="m-0 text-dark"> @yield('content_header_title')</h5>
                            @yield('content_header_option')
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                @yield('content_header')
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>

                @if (!$hideSearchCard)
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="card m-0">
                                    <div class="card-header card-outline card-search bg-gradient-light py-1 px-3 border-bottom">
                                        <h6 class="card-title">กรองข้อมูล</h6>
                                        <div class="card-tools">
                                            <button type="button"   class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                        </div>

                                    </div>
                                    <div class="card-body pt-0 p-2" style="display: block;">
                                        @yield('search_card')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <div class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @yield('content')
        </div>
    </div>

</div>
