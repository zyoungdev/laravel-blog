@extends('admin.main')

@section('css')
    <style>
        tr:hover td{
            background-color: #9999ff;
            cursor: pointer;
        }
    </style>
@endsection

{{-- Article
     title
     uri
     meta_desc
     keywords
     thumbnail_image
     header_image
     published_at
     is_public
     body
--}}

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Thumbnail</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Published</th>
                        <th class="text-center">Updated</th>
                        <th class="text-center">Public</th>
                        <th class="text-center">View</th>
                    </tr>
                </thead>
                @foreach($articles as $article)
                    <tr class="anchor-row">
                        <td>
                            <img src="{{ $article->images->where('image_use_type', 'thumbnail')->first()->folder . '/' . $article->images->where('image_use_type', 'thumbnail')->first()->filename }}" alt="" style="max-width: 75px;" class="center-block">
                        </td>
                        <td style="max-width: 400px;">
                            <a href="/admin/articles/{{ $article->uri }}/edit">
                                {{ str_limit($article->title, 120) }}
                            </a>
                        </td>
                        <td class="text-center">
                            {{ $article->published_at->toDateString() }}
                        </td>
                        <td class="text-center">
                            {{ $article->updated_at->toDateString() }}
                        </td>
                        @if ($article->is_public)
                            <td class="success text-center">
                                Public
                            </td>
                        @else
                            <td class="text-center">
                                Private
                            </td>
                        @endif
                        <td class="text-center">
                            <a href="/admin/articles/{{ $article->uri }}" target="_blank">Preview</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
