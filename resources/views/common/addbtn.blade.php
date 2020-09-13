<script type="text/html" id="toolbarDemo">
    @can('isAdmin')
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-xs" lay-event="add"><i class="layui-icon"></i>{{$name}}</button>
    </div>
    @endcan
</script>
