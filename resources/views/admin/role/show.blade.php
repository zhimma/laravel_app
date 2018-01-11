<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/switchery/dist/switchery.min.css') }}">
<div class="col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 error-box">
        </div>
    </div>
    <form class="form-horizontal form-label-left j_show_role" data-url="{{ route('role.updateAuth',['id'=>$data['role']['id']]) }}">
        {{ csrf_field() }}
        <input type="hidden" class="j_hidden_method_field" name="_method" value="PUT">
        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12 table-scrollable table-scrollable-borderless">
                <table class="table table-hover table-light">
                    <thead>
                    <tr class="uppercase">
                        <th class="col-md-1 text-center"> 模块</th>
                        <th class="col-md-11 text-center"> 权限</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['allPermission'] as $key => $permission)
                        <tr>
                            <td><span class='label label-sm label-success'> {{ $key }} </span>
                            </td>
                            <td>
                                @foreach($permission as $v)
                                    <div class="md-checkbox col-md-3">
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $v['id'] }}" class="js-switch" {{ $v['checked'] }}/> {{ $v['display_name'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>

    </form>
</div>
<script>
    seajs.use('module_js/role/show', function (show) {
        show.init();
        window.show_role = show.show_role;
    })
</script>



