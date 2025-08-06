@extends('frontend.layouts.dashboard.app')

@section('title', 'Loyalty Points')

@push('styles')
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content" id="bookmarksDiv">
            <h3 class="dashboard-title">{{ __('Bookmark List') }}</h3>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Villa Name') }}</th>
                            <th>{{ __('Location') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($favourites as $index => $favourite)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td scope="row">
                                    <div class="villa-listing-item">
                                        <figure class="villa-listing-img">
                                            <img src="{{ asset($favourite->villa->villa_images->first()->image ?? '/frontend/assets/images/blog-1.png') }}"
                                                alt="{{ $favourite->villa->title }}" />
                                        </figure>
                                        <div>
                                            <div class="villa-listing-title">
                                                {{ $favourite->villa->title }}
                                            </div>
                                            <div class="villa-listing-details">
                                                {{ __('Location') }}: {{ $favourite->villa->full_address }}
                                            </div>
                                            <div class="villa-listing-details">
                                                {{ __('Price') }}: ₪{{ $favourite->villa->price }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $favourite->villa->full_address }}</td>
                                <td>₪{{ $favourite->villa->price }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <!-- Go to Page Button -->
                                        <a href="{{ route('villas.details', $favourite->villa->slug) }}"
                                            class="status pending">{{ __('Go to Page') }}</a>

                                        <button type="submit" class="status completed" onclick="showDeleteConfirm('{{ $favourite->id }}')">
                                            {{ __('Remove') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">{{ __('No bookmarks found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- pagination start --}}
            @if ($favourites->count() > 0)
                <div class="pagination-wrapper mt-4 mt-lg-5">
                    <!-- Previous Button -->
                    @if ($favourites->onFirstPage())
                        <span class="pagination-item pagination-item-prev disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $favourites->previousPageUrl() }}" class="pagination-item pagination-item-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </a>
                    @endif

                    <!-- Pagination Numbers -->
                    @php
                        $currentPage = $favourites->currentPage();
                        $lastPage = $favourites->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $favourites->url(1) }}" class="pagination-item">1</a>
                        @if ($start > 2)
                            <span class="pagination-item pagination-more">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $currentPage)
                            <span class="pagination-item active">{{ $i }}</span>
                        @else
                            <a href="{{ $favourites->url($i) }}" class="pagination-item">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <span class="pagination-item pagination-more">...</span>
                        @endif
                        <a href="{{ $favourites->url($lastPage) }}" class="pagination-item">{{ $lastPage }}</a>
                    @endif

                    <!-- Next Button -->
                    @if ($favourites->hasMorePages())
                        <a href="{{ $favourites->nextPageUrl() }}" class="pagination-item pagination-item-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </a>
                    @else
                        <span class="pagination-item pagination-item-next disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M13.2676 10.92L19.6579 17.3243L13.2676 23.7285L15.2349 25.6959L23.6065 17.3243L15.2349 8.95264L13.2676 10.92Z"
                                    fill="#C1C4CC" />
                            </svg>
                        </span>
                    @endif
                </div>
            @else
            @endif
            {{-- pagination end --}}
        </main>
        <!-- main section end -->
    </div>
    <!-- Main layout end -->

@endsection

@push('scripts')

    <script>
        // Confirm Delete Action
        function showDeleteConfirm(id) {
            Swal.fire({
                title: "{{ __('Are you sure you want to remove this bookmark?') }}",
                text: "{{ __('If you remove this, it will be gone.') }}",
                icon: "{{ __('warning') }}",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes, delete it!') }}",
                cancelButtonText: "{{ __('Cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id);
                }
            });
        }

        // Perform Delete via AJAX
        function deleteItem(id) {
            const url = '{{ route('villa.bookmarks.remove', ':id') }}'.replace(':id', id);
            const csrfToken = '{{ csrf_token() }}';

            $.ajax({
                type: 'DELETE',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                success: function(resp) {
                    if (resp.success) {
                        location.reload();
                        showSuccessToast(resp['t-success'] || '{{ __("Bookmark removed successfully") }}');
                    } else if (resp['t-error']) {
                        showErrorToast(resp['t-error'] || '{{ __("An error occurred while removing the bookmark.") }}');
                    }
                },
                error: function() {
                    showErrorToast('{{ __("An error occurred. Please try again.") }}');
                },
            });
        }
    </script>

@endpush
