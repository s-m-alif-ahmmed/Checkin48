@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'My Listing')

@push('styles')
@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.owner-dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">
            <div class="listing-search">
                <div class="status filter-select">
                    <label>{{ __('Post Status') }}:</label>
                    <select class="select2" id="statusFilter"
                        style="border-radius: 10px; width: 100%; padding: 5px; max-width: 250px; @media (max-width: 767px) { width: 100% }">
                        <option value="">{{ __('Select Status') }}</option>
                        <option value="pending">{{ __('Pending') }}</option>
                        <option value="active">{{ __('Approved') }}</option>
                        <option value="inactive">{{ __('Deactive') }}</option>
                    </select>
                </div>

                <div class="search">
                    <label>{{ __('Search') }}:</label>
                    <div class="search-box searching">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M17.5 17.5L12.5 12.5M2.5 8.33333C2.5 9.09938 2.65088 9.85792 2.94404 10.5657C3.23719 11.2734 3.66687 11.9164 4.20854 12.4581C4.75022 12.9998 5.39328 13.4295 6.10101 13.7226C6.80875 14.0158 7.56729 14.1667 8.33333 14.1667C9.09938 14.1667 9.85792 14.0158 10.5657 13.7226C11.2734 13.4295 11.9164 12.9998 12.4581 12.4581C12.9998 11.9164 13.4295 11.2734 13.7226 10.5657C14.0158 9.85792 14.1667 9.09938 14.1667 8.33333C14.1667 7.56729 14.0158 6.80875 13.7226 6.10101C13.4295 5.39328 12.9998 4.75022 12.4581 4.20854C11.9164 3.66687 11.2734 3.23719 10.5657 2.94404C9.85792 2.65088 9.09938 2.5 8.33333 2.5C7.56729 2.5 6.80875 2.65088 6.10101 2.94404C5.39328 3.23719 4.75022 3.66687 4.20854 4.20854C3.66687 4.75022 3.23719 5.39328 2.94404 6.10101C2.65088 6.80875 2.5 7.56729 2.5 8.33333Z"
                                stroke="#798090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" name="search" placeholder="{{ __('Search for villa') }}" />
                    </div>
                </div>
            </div>
            <h3 class="dashboard-title">{{ __('Recent Activity') }}</h3>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Villa Listing') }}</th>
                            <th scope="col" class="text-center">{{ __('Status') }}</th>
                            <th scope="col" class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villas as $villa)
                            <tr>
                                <td scope="row">
                                    <div class="villa-listing-item">
                                        <figure class="villa-listing-img">
                                            <img src="{{ asset($villa->villa_images->first()->image ?? '/frontend/assets/images/blog-1.png') }}"
                                                alt="{{ $villa->title }}`" />
                                        </figure>
                                        <div>
                                            <div class="villa-listing-title">
                                                {{ $villa->title }}
                                            </div>
                                            <div class="villa-listing-details">
                                                {{ __('Posting date') }}: {{ $villa->created_at->format('M d, Y') }}
                                            </div>
                                            <div class="villa-listing-price">₪{{ $villa->price }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="status pending">
                                        @if ($villa->status == 'active')
                                            {{ __('Active') }}
                                        @elseif($villa->status == 'pending')
                                            {{ __('Pending') }}
                                        @elseif($villa->status == 'inactive')
                                            {{ __('Deactive') }}
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="action-container">
                                        <a href="{{ route('owner.edit-villa', $villa->id) }}" type="button"
                                            class="table-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 25 25" fill="none">
                                                <path
                                                    d="M14 7.0003L18 11.0003M4.5 20.5003H8.5L19 10.0003C19.2626 9.73766 19.471 9.42585 19.6131 9.08269C19.7553 8.73953 19.8284 8.37174 19.8284 8.0003C19.8284 7.62887 19.7553 7.26107 19.6131 6.91791C19.471 6.57475 19.2626 6.26295 19 6.0003C18.7374 5.73766 18.4256 5.52932 18.0824 5.38718C17.7392 5.24503 17.3714 5.17187 17 5.17188C16.6286 5.17188 16.2608 5.24503 15.9176 5.38718C15.5744 5.52932 15.2626 5.73766 15 6.0003L4.5 16.5003V20.5003Z"
                                                    stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <button type="button" onclick="showDeleteConfirm('{{ $villa->id }}')"
                                            class="table-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 25 25" fill="none">
                                                <path
                                                    d="M4.5 7.5H20.5M10.5 11.5V17.5M14.5 11.5V17.5M5.5 7.5L6.5 19.5C6.5 20.0304 6.71071 20.5391 7.08579 20.9142C7.46086 21.2893 7.96957 21.5 8.5 21.5H16.5C17.0304 21.5 17.5391 21.2893 17.9142 20.9142C18.2893 20.5391 18.5 20.0304 18.5 19.5L19.5 7.5M9.5 7.5V4.5C9.5 4.23478 9.60536 3.98043 9.79289 3.79289C9.98043 3.60536 10.2348 3.5 10.5 3.5H14.5C14.7652 3.5 15.0196 3.60536 15.2071 3.79289C15.3946 3.98043 15.5 4.23478 15.5 4.5V7.5"
                                                    stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper mt-4 mt-lg-5">
                <!-- Previous Button -->
                @if ($villas->onFirstPage())
                    <span class="pagination-item pagination-item-prev disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                            fill="none">
                            <path
                                d="M21.7324 10.92L15.3421 17.3243L21.7324 23.7285L19.7651 25.6959L11.3935 17.3243L19.7651 8.95264L21.7324 10.92Z"
                                fill="#C1C4CC" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $villas->previousPageUrl() }}" class="pagination-item pagination-item-prev">
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
                    $currentPage = $villas->currentPage();
                    $lastPage = $villas->lastPage();
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if ($start > 1)
                    <a href="{{ $villas->url(1) }}" class="pagination-item">1</a>
                    @if ($start > 2)
                        <span class="pagination-item pagination-more">...</span>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    @if ($i == $currentPage)
                        <span class="pagination-item active">{{ $i }}</span>
                    @else
                        <a href="{{ $villas->url($i) }}" class="pagination-item">{{ $i }}</a>
                    @endif
                @endfor

                @if ($end < $lastPage)
                    @if ($end < $lastPage - 1)
                        <span class="pagination-item pagination-more">...</span>
                    @endif
                    <a href="{{ $villas->url($lastPage) }}" class="pagination-item">{{ $lastPage }}</a>
                @endif

                <!-- Next Button -->
                @if ($villas->hasMorePages())
                    <a href="{{ $villas->nextPageUrl() }}" class="pagination-item pagination-item-next">
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
                title: "{{ __('Are you sure you want to delete this record?') }}",
                text: "{{ __('If you delete this, it will be gone forever.') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes, delete it!') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id);
                }
            });
        }

        // Perform Delete via AJAX
        function deleteItem(id) {
            const url = '{{ route('owner.delete.villa', ':id') }}'.replace(':id', id);
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
                        showSuccessToast(resp['t-success'] || __( 'Villa deleted successfully') );
                    } else if (resp['t-error']) {
                        showErrorToast(resp['t-error'] || __('An error occurred while deleting the villa.') );
                    }
                },
                error: function() {
                    showErrorToast('t-error',  __('An error occurred. Please try again.') );
                },
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".searching input").on("keyup", function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('villas.search') }}",
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let tbody = $(".dashboard-table tbody");
                        tbody.empty();

                        if (data.villas.length === 0) {
                            tbody.append('<tr><td colspan="4">{{ __('No results found') }}</td></tr>');
                            return;
                        }

                        data.villas.forEach(function(villa) {

                            let editUrl = "/owner/edit-villa/" + villa.id;

                            let row = `
                                 <tr>
                                     <td>
                                         <div class="villa-listing-item">
                                             <figure class="villa-listing-img">
                                                 <img src="${villa.image_url}" alt="${villa.title.{{app()->getLocale()}}}" />
                                             </figure>
                                             <div>
                                                 <div class="villa-listing-title">${villa.title.{{app()->getLocale()}}}</div>
                                                 <div class="villa-listing-details">{{ __('Posting date') }}: ${villa.posting_date}</div>
                                                 <div class="villa-listing-price">₪${villa.price}</div>
                                             </div>
                                         </div>
                                     </td>
                                     <td class="text-center">
                                          <div class="status ${
                                                    villa.status === 'active'
                                                    ? 'pending">{{ __('Active') }}'
                                                    : villa.status === '{{ __('Pending') }}'
                                                    ? 'pending">Pending'
                                                    : villa.status === 'inactive'
                                                    ? 'pending">{{ __('Deactive') }}'
                                                    : ''
                                          }</div>
                                     </td>
                                     <td class="text-center">
                                          <div class="action-container">
                                             <a href="${editUrl}" type="button" class="table-action">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                     <path d="M14 7.0003L18 11.0003M4.5 20.5003H8.5L19 10.0003C19.2626 9.73766 19.471 9.42585 19.6131 9.08269C19.7553 8.73953 19.8284 8.37174 19.8284 8.0003C19.8284 7.62887 19.7553 7.26107 19.6131 6.91791C19.471 6.57475 19.2626 6.26295 19 6.0003C18.7374 5.73766 18.4256 5.52932 18.0824 5.38718C17.7392 5.24503 17.3714 5.17187 17 5.17188C16.6286 5.17188 16.2608 5.24503 15.9176 5.38718C15.5744 5.52932 15.2626 5.73766 15 6.0003L4.5 16.5003V20.5003Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 </svg>
                                             </a>
                                             <button type="button" class="table-action" onclick="showDeleteConfirm('${villa.id}')">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                     <path d="M4.5 7.5H20.5M10.5 11.5V17.5M14.5 11.5V17.5M5.5 7.5L6.5 19.5C6.5 20.0304 6.71071 20.5391 7.08579 20.9142C7.46086 21.2893 7.96957 21.5 8.5 21.5H16.5C17.0304 21.5 17.5391 21.2893 17.9142 20.9142C18.2893 20.5391 18.5 20.0304 18.5 19.5L19.5 7.5M9.5 7.5V4.5C9.5 4.23478 9.60536 3.98043 9.79289 3.79289C9.98043 3.60536 10.2348 3.5 10.5 3.5H14.5C14.7652 3.5 15.0196 3.60536 15.2071 3.79289C15.3946 3.98043 15.5 4.23478 15.5 4.5V7.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 </svg>
                                             </button>
                                            </div>
                                     </td>
                                 </tr>
                                 `;
                            tbody.append(row);
                        });
                    },
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#statusFilter").on("change", function() {
                let status = $(this).val();

                $.ajax({
                    url: "{{ route('villas.search.status') }}",
                    type: "GET",
                    data: {
                        status: status
                    },
                    success: function(data) {
                        let tbody = $("tbody");
                        tbody.empty(); // Clear existing rows

                        if (data.villas.length === 0) {
                            tbody.append(
                                '<tr><td colspan="4" class="text-center">{{ __('No results found') }}</td></tr>'
                            );
                            return;
                        }

                        data.villas.forEach(function(villa) {

                            let editUrl = "/owner/edit-villa/" + villa.id;

                            let row = `
                    <tr>
                        <td scope="row">
                            <div class="villa-listing-item">
                                <figure class="villa-listing-img">
                                    <img src="${villa.image_url}" alt="${villa.title.{{app()->getLocale()}}}" />
                                </figure>
                                <div>
                                    <div class="villa-listing-title">${villa.title.{{app()->getLocale()}}}</div>
                                    <div class="villa-listing-details">{{ __('Posting date') }}: ${villa.posting_date}</div>
                                    <div class="villa-listing-price">₪${villa.price}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                                          <div class="status ${
                                                    villa.status === 'active'
                                                    ? 'pending">{{ __('Active') }}'
                                                    : villa.status === 'pending'
                                                    ? 'pending">{{ __('Pending') }}'
                                                    : villa.status === 'inactive'
                                                    ? 'pending">{{ __('Deactive') }}'
                                                    : ''
                                          }</div>
                                     </td>
                                     <td class="text-center">
                                          <div class="action-container">
                                             <a href="${editUrl}" type="button" class="table-action">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                     <path d="M14 7.0003L18 11.0003M4.5 20.5003H8.5L19 10.0003C19.2626 9.73766 19.471 9.42585 19.6131 9.08269C19.7553 8.73953 19.8284 8.37174 19.8284 8.0003C19.8284 7.62887 19.7553 7.26107 19.6131 6.91791C19.471 6.57475 19.2626 6.26295 19 6.0003C18.7374 5.73766 18.4256 5.52932 18.0824 5.38718C17.7392 5.24503 17.3714 5.17187 17 5.17188C16.6286 5.17188 16.2608 5.24503 15.9176 5.38718C15.5744 5.52932 15.2626 5.73766 15 6.0003L4.5 16.5003V20.5003Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 </svg>
                                             </a>
                                             <button type="button" class="table-action" onclick="showDeleteConfirm('${villa.id}')">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                     <path d="M4.5 7.5H20.5M10.5 11.5V17.5M14.5 11.5V17.5M5.5 7.5L6.5 19.5C6.5 20.0304 6.71071 20.5391 7.08579 20.9142C7.46086 21.2893 7.96957 21.5 8.5 21.5H16.5C17.0304 21.5 17.5391 21.2893 17.9142 20.9142C18.2893 20.5391 18.5 20.0304 18.5 19.5L19.5 7.5M9.5 7.5V4.5C9.5 4.23478 9.60536 3.98043 9.79289 3.79289C9.98043 3.60536 10.2348 3.5 10.5 3.5H14.5C14.7652 3.5 15.0196 3.60536 15.2071 3.79289C15.3946 3.98043 15.5 4.23478 15.5 4.5V7.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 </svg>
                                             </button>
                                            </div>
                                     </td>
                    </tr>
                    `;
                            tbody.append(row);
                        });
                    },
                    error: function() {
                        showErrorToast(__('An error occurred. Please try again later.'));
                    },
                });
            });
        });
    </script>
@endpush
