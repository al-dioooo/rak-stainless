<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<script src="{{ asset('js/focus-trap.js') }}"></script>

<script>
    function data() {

        return {
            isSideMenuOpen: false,
            toggleSideMenu() {
                this.isSideMenuOpen = !this.isSideMenuOpen
            },
            closeSideMenu() {
                this.isSideMenuOpen = false
            },
            isProfileMenuOpen: false,
            toggleProfileMenu() {
                this.isProfileMenuOpen = !this.isProfileMenuOpen
            },
            closeProfileMenu() {
                this.isProfileMenuOpen = false
            },
            isPagesMenuOpen: false,
            togglePagesMenu() {
                this.isPagesMenuOpen = !this.isPagesMenuOpen
            },
            // Modal
            isModalOpen: false,
            trapCleanup: null,
            openModal() {
                this.isModalOpen = true
                this.trapCleanup = focusTrap(document.querySelector('#modal'))
            },
            closeModal() {
                this.isModalOpen = false
                this.trapCleanup()
            },
        }
    }
</script>

{{-- <script src="https://apis.google.com/js/platform.js" async defer></script> --}}
