<div class="content-wrap">
    <div class="main">
        <!-- breadcrum -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Sistem</a></li>
                                <li class="active">{{ $title }}</li>
                                <li class="active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <!-- akhir breadcrum -->
                <div class="main-content">
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit</h4>
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <a href="{{ site_url('sistem/navigation') }}" type="button"
                                                class="btn btn-default m-b-10 m-l-5">Kembali</a>
                                        </ul>
                                    </div>
                                </div>

                                {{-- notif --}}
                                @include('template/notif')

                                <hr>
                                <div class="card-body" style="margin-top:20px">
                                    <div class="card-content">
                                        <div class="main">
                                            <div class="horizontal-form-elements">
                                                <form class="form-horizontal"
                                                    action="{{ site_url('sistem/navigation/edit_process') }}"
                                                    method="post">
                                                    <input type="hidden" name="nav_id" value="{{ $result['role_id'] }}">
                                                    <table class="table table-responsive table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-align text-center">No.</th>
                                                                <th class="text-align text-center">Judul Navigasi</th>
                                                                <th class="text-align text-center">URL Navigasi</th>
                                                                <th class="text-align text-center">Digunakan</th>
                                                                <th class="text-align text-center">Ditampilkan</th>
                                                                <th class="text-align text-center"></th>
                                                                <th  class="text-align text-center"> <input type="checkbox"> Pilih Semua</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($rs_menu as $rs)
                                                            <tr>
                                                                <th class="text-align text-center"> {{ $no++ }} </th>
                                                                <td>
                                                                    @if ($rs['parent_id'] == 0)
                                                                    {{ $rs['nav_title'] }}
                                                                    @else
                                                                    -- {{ $rs['nav_title'] }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $rs['nav_url'] }}</td>
                                                                <td class="text-align text-center">
                                                                    @if ($rs['active_st'] == 1)
                                                                    <span class="label label-primary">Ya</span>
                                                                    @else
                                                                    <span class="label label-danger">Tidak</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-align text-center">
                                                                    @if ($rs['display_st'] == 1)
                                                                    <span class="label label-primary">Ya</span>
                                                                    @else
                                                                    <span class="label label-danger">Tidak</span>
                                                                    @endif
                                                                </td>
                                                                <td> <input type="checkbox"> </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <label class="control-label"><b> Created by
                                                                        </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <!-- <label
                                                                        class="control-label">{{ $result['mdb_name'] }}</label> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <label class="control-label"><b> Date update
                                                                        </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <label
                                                                        class="control-label">{{ $result['mdd'] }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="card-footer text-right">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-rounded m-b-10 m-l-5">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-dark btn-rounded m-b-10 m-l-5">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @push('ext_js')
            <script>
                $(document).ready(function () {
                    $(".select2-single").select2({
                        placeholder: placeholder,
                        width: '100%',
                        containerCssClass: ':all:'
                    });
                });
            </script>
            @endpush