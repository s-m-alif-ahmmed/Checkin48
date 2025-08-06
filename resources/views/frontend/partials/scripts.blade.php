<!-- Javascript Links -->

<!-- plugins js -->
<script src="{{ asset('/frontend/assets/js/plugins/bootstrap-5.3.3.bundle.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/frontend/assets/js/plugins/easepick-1.2.1.umd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/frontend/assets/js/plugins/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/frontend/assets/js/plugins/owl.carousel-2.3.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/frontend/assets/js/plugins/select2-4.1.0-rc.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('/frontend/assets/js/plugins/popper-2.11.8.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/frontend/assets/js/main.js') }}" type="text/javascript"></script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- main js -->

{{-- <script type="text/javascript">
    const picker = new easepick.create({
        element: '#checkIn',
        css: [
            '{{ asset('/frontend/assets/css/plugins/easepick-1.2.1.css') }}',
            '{{ asset('/frontend/assets/css/easepick-edit.css') }}',
        ],
        plugins: ['AmpPlugin', 'RangePlugin', 'LockPlugin'],
        zIndex: 50,
        AmpPlugin: {
            dropdown: {
                months: true,
                years: true,
            },
            resetButton: true,
            darkMode: false,
        },
        RangePlugin: {
            elementEnd: '#checkOut',
        },
        LockPlugin: {
            selectForward: true,
        },
    });
</script> --}}

{{-- Toast --}}
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

{{--sweetalert2--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>


<script>
    // Toaster
    function showSuccessToast(message) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top", // top or bottom
            position: 'right', // left, center, or right
            backgroundColor: "#1E84FE", // success color
            color: "#FFFFFF",
            stopOnFocus: true, // Prevents dismissing of toast on hover
            close: true, // Add a close button
        }).showToast();
    }

    function showErrorToast(message) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top", // top or bottom
            position: 'right', // left, center, or right
            backgroundColor: "#FE0000", // error color
            color: "#FFFFFF",
            stopOnFocus: true, // Prevents dismissing of toast on hover
            close: true, // Add a close button
        }).showToast();
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Check for success message
        @if(session('t-success'))
        showSuccessToast("{{ session('t-success') }}", "Success");
        @endif

        // Check for error message
        @if(session('t-error'))
        showErrorToast("{{ session('t-error') }}", "Error");
        @endif
    });

</script>

<!-- Include the Google Translate Element -->
<script type="text/javascript">
    function googleTranslateElementInit2() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            autoDisplay: false
        }, 'google_translate_element2');
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    eval(function (p, a, c, k, e, r) {
        e = function (c) {
            return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
        };
        if (!''.replace(/^/, String)) {
            while (c--) r[e(c)] = k[c] || e(c);
            k = [function (e) {
                return r[e]
            }];
            e = function () {
                return '\\w+'
            };
            c = 1
        }
        while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
        return p
    }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
    /* ]]> */
</script>

@stack('scripts')
