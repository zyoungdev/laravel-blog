@extends('admin.main')

@section('css')
    <style>
    .img-row {
        height: 150px;
    }
    .img-cell {
        display: table-cell;
        vertical-align: middle !important;
    }
    tr:hover td{
        background-color: #9999ff;
        cursor: pointer;
    }
    </style>
@endsection

{{-- Multimed
title
alt
image_use_type', ['thumbnail', 'header', 'general']
folder
safename
filename
filetype
extension
filesize
--}}


@section('content')
    <div class="container">
        <div class="container">
            <ul class="nav nav-tabs nav-justified" id="tabs">
                <li>
                    <a href="#thumbnails" data-toggle="tab">Thumbnails</a>
                </li>
                <li>
                    <a href="#headers" data-toggle="tab">Headers</a>
                </li>
                <li>
                    <a href="#general" data-toggle="tab">General Purpose</a>
                </li>
            </ul>
            <div class="tab-content">
                @foreach ($images as $key => $imagetype)
                    <div class="table-responsive tab-pane" id="{{ $key }}">
                        <table class="table table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    @if ($key == 'thumbnails')
                                        <th class="text-center">Thumbnail</th>
                                    @endif
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Updated</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">View</th>
                                </tr>
                            </thead>
                            @foreach($imagetype as $image)
                                <tr class="anchor-row img-row" data-href="/admin/images/{{ $image->filename }}/edit">
                                    @if ($key == 'thumbnails')
                                        <td class="img-cell">
                                            <img src="{{ $image->folder . '/' . $image->filename }}" alt="{{ $image->alt }}" style="max-width: 150px; max-height: 150px;" class="center-block">
                                        </td>
                                    @endif
                                    <td style="max-width: 400px;">
                                        {{ substr($image->title, 0, 120) }}
                                        @if (strlen($image->title) > 120)
                                            ...
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $image->created_at->toDateString() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $image->updated_at->toDateString() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $image->filesize }}
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/images/{{ $image->filename }}">Preview</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        jQuery(".anchor-row").click(function(){
            window.document.location = $(this).data("href");
        });
        jQuery("#tabs a:first").tab('show');
    </script>
@endsection

