
<script src="{{ base_url('assets/js/lib/jquery.min.js') }}"></script>
@if(!empty($js))
        @foreach ($js as $url_js)
        <script src="{{ base_url($url_js) }}"></script>
        @endforeach
@endif
<script src="{{ base_url('assets/js/lib/jquery.plugin.js') }}"></script>
<!-- jquery vendor -->
<script src="{{ base_url('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
<!-- nano scroller -->
<script src="{{ base_url('assets/js/lib/sidebar.js') }}"></script>
<!-- sidebar -->
<script src="{{ base_url('assets/js/lib/bootstrap.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ base_url('assets/js/lib/mmc-common.js') }}"></script>
{{-- <script src="assets/js/lib/mmc-chat.js"></script> --}}
<!--  Chart js -->
{{-- <script src="assets/js/lib/chart-js/Chart.bundle.js"></script> --}}
{{-- <script src="assets/js/lib/chart-js/chartjs-init.js"></script> --}}
{{-- Chart js  --}}
{{-- Datamap --}}
<script src="{{ base_url('assets/js/lib/datamap/d3.min.js') }}"></script>
<script src="{{ base_url('assets/js/lib/datamap/topojson.js') }}"></script>
<script src="{{ base_url('assets/js/lib/datamap/datamaps.world.min.js') }}"></script>
{{-- <script src="{{ base_url('assets/js/lib/datamap/datamap-init.js') }}"></script> --}}
{{-- <script src="{{ base_url('assets/lib/lobipanel/js/lobipanel.js') }}"></script> --}}


<script src="{{ base_url('assets/js/scripts.js') }}"></script>
@stack('ext_js')

</body>

</html>