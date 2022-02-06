<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#333844">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#333844">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#333844">

    <title>{{ trans('laravel-filemanager::lfm.title-page') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <style>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/css/lfm.css')) !!}

    </style> --}}
    {{-- Use the line below instead of the above if you need to cache the css. --}}
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-filemanager/css/lfm.css') }}">
</head>

<body>
    <nav
        class="flex items-center justify-between p-2 mx-2 mb-4 border-b border-gray-200 text-primary-500 navbar-expand">
        <a class="inline-flex items-center" id="to-previous">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
            </svg>
            <span
                class="hidden transform -translate-y-px lg:inline">{{ trans('laravel-filemanager::lfm.nav-back') }}</span>
        </a>
        <a class="lg:hidden" id="show_tree">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <rect x="4" y="4" width="16" height="6" rx="2" />
                <rect x="4" y="14" width="16" height="6" rx="2" />
            </svg>
        </a>
        <a class="mx-2 lg:hidden" id="current_folder"></a>
        <a id="loading" class="flex items-center mx-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </a>
        <div class="mx-2 ml-auto">
            <a class="flex items-center mx-2 space-x-2" id="multi_selection_toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 12l5 5l10 -10"></path>
                    <path d="M2 12l5 5m5 -5l5 -5"></path>
                </svg>
                <span class="hidden xl:inline">{{ trans('laravel-filemanager::lfm.menu-multiple') }}</span>
            </a>
        </div>
        <a class="px-1 py-2 m-0 border-0 navbar-toggler collapsed" data-toggle="collapse" data-target="#nav-buttons">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </a>
        <div class="flex-grow-0 collapse navbar-collapse" id="nav-buttons">
            <ul class="space-x-4 navbar-nav">
                <li>
                    <a class="inline-flex items-center h-full space-x-2" data-display="grid">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="4" y="4" width="6" height="6" rx="1" />
                            <rect x="14" y="4" width="6" height="6" rx="1" />
                            <rect x="4" y="14" width="6" height="6" rx="1" />
                            <rect x="14" y="14" width="6" height="6" rx="1" />
                        </svg>
                        <span class="hidden xl:inline">{{ trans('laravel-filemanager::lfm.nav-thumbnails') }}</span>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center h-full space-x-2" data-display="list">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M11 6h9" />
                            <path d="M11 12h9" />
                            <path d="M12 18h8" />
                            <path d="M4 16a2 2 0 1 1 4 0c0 .591 -.5 1 -1 1.5l-3 2.5h4" />
                            <path d="M6 10v-6l-2 2" />
                        </svg>
                        <span class="hidden xl:inline">{{ trans('laravel-filemanager::lfm.nav-list') }}</span>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center h-full space-x-2" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-selector" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="8 9 12 5 16 9"></polyline>
                            <polyline points="16 15 12 19 8 15"></polyline>
                        </svg>
                        <span>{{ trans('laravel-filemanager::lfm.nav-sort') }}</span>
                    </a>
                    <div class="border-0 dropdown-menu dropdown-menu-right"></div>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="fixed bottom-0 left-0 right-0 flex items-center hidden px-8 mx-10 border-t border-gray-200 text-primary-500" id="actions">
        <a data-action="open" data-multiple="false" class="flex items-center justify-center p-4 space-x-2 cursor-pointer hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
            </svg>
            <span>
                {{ trans('laravel-filemanager::lfm.btn-open') }}
            </span>
        </a>
        <a data-action="preview" data-multiple="true" class="flex items-center justify-center p-4 space-x-2 cursor-pointer hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="15" y1="8" x2="15.01" y2="8" />
                <rect x="4" y="4" width="16" height="16" rx="3" />
                <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" />
                <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" />
            </svg>
            <span>
                {{ trans('laravel-filemanager::lfm.menu-view') }}
            </span>
        </a>
        <a data-action="use" data-multiple="true" class="flex items-center justify-center p-4 space-x-2 cursor-pointer hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l5 5l10 -10"></path>
            </svg>
            <span>
                {{ trans('laravel-filemanager::lfm.btn-confirm') }}
            </span>
        </a>
    </nav>

    <div class="flex">
        <div id="tree"></div>

        <div id="main">
            <div id="alerts"></div>

            <nav aria-label="breadcrumb" class="d-none d-lg-block" id="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="invisible breadcrumb-item">Home</li>
                </ol>
            </nav>

            <div id="empty" class="d-none">
                <i class="far fa-folder-open"></i>
                {{ trans('laravel-filemanager::lfm.message-empty') }}
            </div>

            <div id="content"></div>
            <div id="pagination"></div>

            <a id="item-template" class="d-none">
                <div class="square"></div>

                <div class="info">
                    <div class="item_name text-truncate"></div>
                    <time class="text-muted font-weight-light text-truncate"></time>
                </div>
            </a>
        </div>

        <div id="fab"></div>
    </div>

    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ trans('laravel-filemanager::lfm.title-upload') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aia-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unisharp.lfm.upload') }}" role='form' id='uploadForm' name='uploadForm'
                        method='post' enctype='multipart/form-data' class="dropzone">
                        <div class="form-group" id="attachment">
                            <div class="text-center controls">
                                <div class="input-group w-100">
                                    <a class="text-white btn btn-primary w-100"
                                        id="upload-button">{{ trans('laravel-filemanager::lfm.message-choose') }}</a>
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='working_dir' id='working_dir'>
                        <input type='hidden' name='type' id='type' value='{{ request('type') }}'>
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-100"
                        data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notify" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-100"
                        data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
                    <button type="button" class="btn btn-primary w-100"
                        data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-100"
                        data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
                    <button type="button" class="btn btn-primary w-100"
                        data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="carouselTemplate" class="d-none carousel slide bg-light" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#previewCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a class="carousel-label"></a>
                <div class="carousel-image"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#previewCarousel" role="button" data-slide="prev">
            <div class="carousel-control-background" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
            </div>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#previewCarousel" role="button" data-slide="next">
            <div class="carousel-control-background" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
            </div>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
    <script>
        var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
        var actions = [
            // {
            //   name: 'use',
            //   icon: 'check',
            //   label: 'Confirm',
            //   multiple: true
            // },
            {
                name: 'rename',
                icon: 'pencil',
                label: lang['menu-rename'],
                multiple: false
            },
            {
                name: 'download',
                icon: 'download',
                label: lang['menu-download'],
                multiple: true
            },
            // {
            //   name: 'preview',
            //   icon: 'image',
            //   label: lang['menu-view'],
            //   multiple: true
            // },
            {
                name: 'move',
                icon: 'clipboard',
                label: lang['menu-move'],
                multiple: true
            },
            {
                name: 'resize',
                icon: 'resize',
                label: lang['menu-resize'],
                multiple: false
            },
            {
                name: 'crop',
                icon: 'crop',
                label: lang['menu-crop'],
                multiple: false
            },
            {
                name: 'trash',
                icon: 'trash',
                label: lang['menu-delete'],
                multiple: true
            },
        ];

        var sortings = [{
                by: 'alphabetic',
                icon: 'sort-alpha-down',
                label: lang['nav-sort-alphabetic']
            },
            {
                by: 'time',
                icon: 'sort-numeric-down',
                label: lang['nav-sort-time']
            }
        ];
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/script.js')) !!}
    </script>
    {{-- Use the line below instead of the above if you need to cache the script. --}}
    {{-- <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script> --}}
    <script>
        Dropzone.options.uploadForm = {
            paramName: "upload[]", // The name that will be used to transfer the file
            uploadMultiple: false,
            parallelUploads: 5,
            timeout: 0,
            clickable: '#upload-button',
            dictDefaultMessage: lang['message-drop'],
            init: function() {
                var _this = this; // For the closure
                this.on('success', function(file, response) {
                    if (response == 'OK') {
                        loadFolders();
                    } else {
                        this.defaultOptions.error(file, response.join('\n'));
                    }
                });
            },
            headers: {
                'Authorization': 'Bearer ' + getUrlParam('token')
            },
            acceptedFiles: "{{ implode(',', $helper->availableMimeTypes()) }}",
            maxFilesize: ({{ $helper->maxUploadSize() }} / 1000)
        }
    </script>
</body>

</html>
