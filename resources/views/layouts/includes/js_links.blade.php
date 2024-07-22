<script src="{{ asset('js/passwordToggle.js') }}?v={{ config("app.scripts_version") }}"></script>

@auth
    <script src="{{ asset('js/assets/jquery.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/sweetalert.js') }}?v={{ config("app.scripts_version") }}"></script>

    <script src="{{ asset('js/assets/dataTables/jquery.dataTables.min.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/dataTables/dataTables.buttons.min.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/dataTables/jszip.min.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/dataTables/pdfmake.min.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/dataTables/vfs_fonts.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/dataTables/buttons.html5.min.js') }}?v={{ config("app.scripts_version") }}"></script>
    <script src="{{ asset('js/assets/dataTables/buttons.print.min.js') }}?v={{ config("app.scripts_version") }}"></script>

    <script src="{{ asset('js/global.js') }}?v={{ config("app.scripts_version") }}"></script>
@endauth
