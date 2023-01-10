@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page', 'Dashboard Admin')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('admin.gallery.index') }}">
                    <x-card.widget :title="$gallery['title']" :value="$gallery['total']">
                    </x-card.widget>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('admin.news.index') }}">
                    <x-card.widget :title="$news['title']" :value="$news['total']">
                    </x-card.widget>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('admin.agenda.index') }}">
                    <x-card.widget :title="$event['title']" :value="$event['total']">
                        <span class="badge bg-info rounded-pill float-start mt-3">
                            {{ $event['note'] }}
                            <i class="mdi mdi-help-circle-outline"></i>
                        </span>
                    </x-card.widget>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('admin.announcement.index') }}">
                    <x-card.widget :title="$announcement['title']" :value="$announcement['total']">
                        <span class="badge bg-info rounded-pill float-start mt-3">
                            {{ $announcement['note'] }}
                            <i class="mdi mdi-help-circle-outline"></i>
                        </span>
                    </x-card.widget>
                </a>
            </div>
        </div>
        @foreach ($tables as $table)
            <div class="row">
                <div class="col-xl-12">
                    <x-card.card :title="$table['title']">
                        <x-table.table :headers="$table['headers']">
                            @forelse ($table['data'] as $data)
                                <tr>
                                    @foreach ($table['body'] as $body)
                                        <x-table.td>{{ $data[$body] ?? "-" }}</x-table.td>
                                    @endforeach
                                </tr>
                            @empty
                            @endforelse
                        </x-table.table>
                    </x-card.card>
                </div>
            </div>
        @endforeach
    </div>
@endsection
