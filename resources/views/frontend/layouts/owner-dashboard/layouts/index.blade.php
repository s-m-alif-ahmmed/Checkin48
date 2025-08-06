@extends('frontend.layouts.owner-dashboard.app')

@section('title', 'Owner Dashboard')

@push('styles')

@endpush

@section('content')

    <!-- Main layout start -->
    <div class="main-content">

        {{--        Header --}}
        @include('frontend.layouts.owner-dashboard.partials.header')

        <!-- main section start -->
        <main class="dashboard-content">

            <h3 class="dashboard-title">{{ __('Summary') }}</h3>
            <div class="dashboard-stats">
                <div class="dashboard-stat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M1.6402 17.0729C1.71513 17.0729 1.7963 17.0541 1.87747 17.0229L3.71314 16.2799L3.7506 16.2674L14.1278 12.8084V14.1258L4.14396 17.4537L2.88896 17.9595V28.1493C2.88896 28.4927 3.16993 28.7737 3.51334 28.7737H6.01085V18.1843C6.01085 17.8408 6.29182 17.5599 6.63522 17.5599H11.6302C11.9737 17.5599 12.2546 17.8408 12.2546 18.1843V28.7737H14.6273C14.671 28.7799 14.7084 28.7987 14.7521 28.7987H18.4984V22.6923C18.4984 21.0626 19.691 19.6078 21.3143 19.4517C21.7478 19.4086 22.1855 19.4567 22.5992 19.593C23.013 19.7293 23.3936 19.9507 23.7165 20.2431C24.0394 20.5354 24.2975 20.8922 24.4742 21.2903C24.6508 21.6885 24.7421 22.1193 24.7422 22.5549V28.7987H28.4884C28.8318 28.7987 29.1128 28.5177 29.1128 28.1743V11.5596L14.1278 7.48242V11.4909L3.31354 15.0936C3.30105 15.0998 3.28856 15.0998 3.27607 15.1061L3.21988 15.131L1.40294 15.8678C1.08451 15.9989 0.934657 16.3611 1.05953 16.6795C1.15943 16.923 1.3967 17.0729 1.6402 17.0729ZM21.6203 10.6917C23.0002 10.6917 24.1178 11.8094 24.1178 13.1892C24.1178 14.5691 23.0002 15.6867 21.6203 15.6867C20.2404 15.6867 19.1228 14.5691 19.1228 13.1892C19.1228 11.8094 20.2404 10.6917 21.6203 10.6917Z"
                            fill="#1E84FE" />
                        <path
                            d="M7.25977 18.8087H11.006V20.0574H7.25977V18.8087ZM7.25977 26.3012H11.006V28.7737H7.25977V26.3012ZM7.25977 23.8037H11.006V25.0524H7.25977V23.8037ZM7.25977 21.3062H11.006V22.5549H7.25977V21.3062ZM26.6155 3.8236C26.6155 3.48019 26.3345 3.19922 25.9911 3.19922H23.4936C23.1502 3.19922 22.8692 3.48019 22.8692 3.8236V5.98394L26.6155 7.00168V3.8236ZM12.7168 5.80287L30.1994 10.5606C30.2493 10.5794 30.3055 10.5856 30.3617 10.5856C30.6365 10.5856 30.8862 10.4045 30.9611 10.1236C30.9837 10.0448 30.9903 9.96239 30.9804 9.88109C30.9706 9.79978 30.9445 9.72129 30.9037 9.65025C30.863 9.57921 30.8084 9.51708 30.7431 9.46754C30.6779 9.41799 30.6034 9.38205 30.5241 9.36183L13.0415 4.59782C12.9628 4.57568 12.8804 4.56945 12.7993 4.57951C12.7181 4.58957 12.6398 4.61571 12.5689 4.65641C12.4979 4.69711 12.4358 4.75154 12.3862 4.81653C12.3365 4.88152 12.3004 4.95575 12.2798 5.03489C12.1861 5.36581 12.3797 5.70922 12.7168 5.80287Z"
                            fill="#1E84FE" />
                    </svg>
                    <div>
                        <div class="top-title">{{ __('Total Villa') }}</div>
                        <div class="stat">
                            <span>{{ $total_accept_villas }}</span>/{{ $total_villas }}
                            {{ __('remaining') }}
                        </div>
                    </div>
                </div>
                <div class="dashboard-stat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32"
                        fill="none">
                        <path
                            d="M25.1432 3.19922H8.18808C4.92243 3.19922 2.26562 5.71137 2.26562 8.79922C2.26562 11.902 4.95004 14.3992 8.15275 14.3992H10.8128V10.0116C10.8128 8.04662 12.5034 6.44801 14.5814 6.44801H14.5897C16.6633 6.45222 18.3503 8.05082 18.3503 10.0116V14.3992H25.1432C28.4089 14.3992 31.0656 11.8871 31.0656 8.79922C31.0656 5.71137 28.4089 3.19922 25.1432 3.19922ZM26.8191 8.01832L23.4441 11.2096C23.1147 11.5211 22.5804 11.5212 22.2509 11.2096L20.5634 9.61394C20.2339 9.30237 20.2339 8.79725 20.5634 8.48568C20.8929 8.17411 21.4271 8.17411 21.7566 8.48568L22.8476 9.51714L25.626 6.89005C25.9554 6.57848 26.4897 6.57848 26.8192 6.89005C27.1487 7.20163 27.1487 7.7068 26.8191 8.01832Z"
                            fill="#1E84FE" />
                        <path
                            d="M22.3927 16.6263L16.8252 16.0909V9.97375C16.8252 8.88531 15.8729 8.00235 14.6965 8C13.5165 7.99766 12.5586 8.882 12.5586 9.97375V20.2116H12.5392L10.4335 18.5845C9.54526 17.8983 8.21985 18.027 7.50491 18.8688C6.81932 19.6761 6.9517 20.8414 7.80369 21.4992L12.0779 24.7992H24.6664V19.0083C24.6664 17.7973 23.6915 16.776 22.3927 16.6263ZM12.5586 27.9998C12.5586 28.4417 12.9458 28.8 13.4234 28.8H23.8016C24.2792 28.8 24.6664 28.4417 24.6664 27.9998V26.3995H12.5586V27.9998Z"
                            fill="#1E84FE" />
                    </svg>
                    <div>
                        <div class="top-title">{{ __('Total Bookings') }}</div>
                        <div class="stat"><span>{{ $Bookings->count() }}</span></div>
                    </div>
                </div>
                <div class="dashboard-stat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32"
                        fill="none">
                        <path
                            d="M4.00949 20.3031C3.58012 20.3444 3.26511 20.725 3.30636 21.1544C3.34449 21.5588 3.68512 21.8619 4.08324 21.8619C4.10762 21.8619 4.13262 21.8606 4.15824 21.8581C4.31699 21.8431 8.09386 21.4631 12.8582 19.1531C15.6526 17.7981 18.2076 16.0556 20.4532 13.9738C23.052 11.5644 25.2376 8.69251 26.9601 5.42939L27.0545 5.70064C27.1664 6.02376 27.4689 6.22626 27.7926 6.22626C27.8776 6.22626 27.9639 6.21251 28.0489 6.18314C28.4564 6.04189 28.6726 5.59689 28.5307 5.18876L27.8376 3.19126C27.7696 2.99551 27.6266 2.83478 27.4401 2.74439C27.3478 2.69954 27.2476 2.67336 27.1452 2.66735C27.0427 2.66135 26.9401 2.67563 26.8432 2.70939L24.8457 3.40251C24.4382 3.54376 24.2226 3.98876 24.3639 4.39689C24.5051 4.80439 24.9501 5.02001 25.3582 4.87876L25.5107 4.82564C23.8876 7.86751 21.8432 10.5475 19.4214 12.7994C17.2976 14.7744 14.8795 16.4294 12.2345 17.7188C7.72136 19.9188 4.05949 20.2975 4.00949 20.3025V20.3031Z"
                            fill="#1E84FE" />
                        <path
                            d="M9.57586 16.765C13.724 16.765 17.099 13.39 17.099 9.24187C17.099 5.09375 13.724 1.71875 9.57586 1.71875C5.42773 1.71875 2.05273 5.09375 2.05273 9.24187C2.05273 13.39 5.42773 16.765 9.57586 16.765ZM9.57586 3.28187C12.8621 3.28187 15.5365 5.95563 15.5365 9.2425C15.5365 12.5294 12.8627 15.2031 9.57586 15.2031C6.28898 15.2031 3.61523 12.5294 3.61523 9.2425C3.61523 5.95563 6.28898 3.28187 9.57586 3.28187Z"
                            fill="#1E84FE" />
                        <path
                            d="M9.43094 10.0091C9.51281 10.0248 10.2291 10.1716 10.2291 10.5673C10.2291 10.8673 9.93656 11.1116 9.57656 11.1116C9.30719 11.1116 9.06156 10.9691 8.96531 10.7573C8.78656 10.3648 8.32344 10.191 7.93094 10.3698C7.53844 10.5485 7.36469 11.0116 7.54344 11.4041C7.78656 11.9385 8.24406 12.341 8.79594 12.5385V13.0354C8.79594 13.4666 9.14594 13.8166 9.57719 13.8166C10.0084 13.8166 10.3584 13.4666 10.3584 13.0354V12.5385C11.1953 12.2373 11.7922 11.4679 11.7922 10.5673C11.7922 9.53352 10.9797 8.71227 9.72281 8.47352C9.64094 8.45789 8.92469 8.31102 8.92469 7.91539C8.92469 7.61477 9.21719 7.37102 9.57719 7.37102C9.84656 7.37102 10.0922 7.51352 10.1884 7.72602C10.3672 8.11852 10.8297 8.29227 11.2228 8.11352C11.6153 7.93477 11.7891 7.47164 11.6103 7.07914C11.3672 6.54477 10.9097 6.14164 10.3578 5.94414V5.44727C10.3578 5.01602 10.0078 4.66602 9.57656 4.66602C9.14531 4.66602 8.79531 5.01602 8.79531 5.44727V5.94414C7.95844 6.24539 7.36156 7.01539 7.36156 7.91539C7.36156 8.94852 8.17406 9.77039 9.43156 10.0085L9.43094 10.0091ZM29.8347 28.7185H27.4909V16.8766C27.4909 15.0673 26.0191 13.5954 24.2097 13.5954C22.4003 13.5954 20.9284 15.0673 20.9284 16.8766V28.7185H19.6166V22.6273C19.6166 20.8179 18.1447 19.346 16.3353 19.346C14.5259 19.346 13.0541 20.8179 13.0541 22.6273V28.7185H11.7422V25.6273C11.7422 23.8179 10.2703 22.346 8.46094 22.346C6.65156 22.346 5.17969 23.8179 5.17969 25.6273V28.7185H2.83594C2.40469 28.7185 2.05469 29.0685 2.05469 29.4998C2.05469 29.931 2.40469 30.281 2.83594 30.281H29.8353C30.2666 30.281 30.6166 29.931 30.6166 29.4998C30.6166 29.0685 30.2666 28.7185 29.8353 28.7185H29.8347Z"
                            fill="#1E84FE" />
                    </svg>
                    <div>
                        <div class="top-title">{{ __('Total Earnings') }}</div>
                        <div class="stat"><span>₪{{ number_format($Bookings->where('status', 'approved')->sum('subtotal') * 0.85, 2) }}</span></div>
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
                                                alt="{{ $villa->title }}" />
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
                                        <button type="button" class="table-action"
                                            onclick="showDeleteConfirm('{{ $villa->id }}')">
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
                icon: "{{ __('warning') }}",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes, delete it!') }}",
                cancelButtonText: "{{ __('No, cancel!') }}",
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
                        showSuccessToast(resp['t-success'] || __('Villa deleted successfully'));
                    } else if (resp['t-error']) {
                        showErrorToast(resp['t-error'] || __('An error occurred while deleting the villa.'));
                    }
                },
                error: function() {
                    showErrorToast(__('An error occurred. Please try again.'));
                },
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".dashboard-search-input input").on("keyup", function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('owner.search.villa') }}", // Current owner's search route
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let tbody = $(".dashboard-table tbody");
                        tbody.empty();

                        if (data.villas.length === 0) {
                            tbody.append(
                                '<tr><td colspan="4">{{ __('No results found') }}</td></tr>'
                                );
                            return;
                        }

                        data.villas.forEach(function(villa) {
                            console.log(villa.villa_images);
                            let imageUrl = villa.image_url;
                            let editUrl = "/owner/edit-villa/" + villa.id;

                            // created_at date formating
                            const createdAt = new Date(villa.created_at);
                            const formattedCreatedAt = new Intl.DateTimeFormat(
                                'en-US', {
                                    month: 'short',
                                    day: '2-digit',
                                    year: 'numeric',
                                }).format(createdAt);

                            let row = `
                            <tr>
                                <td>
                                    <div class="villa-listing-item">
                                        <figure class="villa-listing-img">
                                            <img src="${imageUrl}" alt="${villa.title.{{app()->getLocale()}}}" />
                                        </figure>
                                        <div>
                                            <div class="villa-listing-title">${villa.title.{{app()->getLocale()}}}</div>
                                            <div class="villa-listing-details">
                                                {{ __('Posting date') }}: ${formattedCreatedAt}
                                            </div>
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
                                <td>
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
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            });
        });
    </script>
@endpush
