<script src="{{ asset('') }}package/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('') }}package/src/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="{{ asset('') }}package/src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="{{ asset('') }}package/src/dist/js/app-style-switcher.js"></script>
<script src="{{ asset('') }}package/src/dist/js/feather.min.js"></script>
<script src="{{ asset('') }}package/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="{{ asset('') }}package/src/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{ asset('') }}package/src/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
{{-- <script src="{{ asset('') }}package/src/assets/extra-libs/c3/d3.min.js"></script>
<script src="{{ asset('') }}package/src/assets/extra-libs/c3/c3.min.js"></script>
<script src="{{ asset('') }}package/src/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="{{ asset('') }}package/src/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="{{ asset('') }}package/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('') }}package/src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('') }}package/src/dist/js/pages/dashboards/dashboard1.min.js"></script> --}}
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('') }}package/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}package/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
{{-- <script src="{{asset('node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
<script src="{{ asset('plugins/jquery.form.min.js') }}"></script>
<script src="{{ asset('node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
@yield('custom_js')
