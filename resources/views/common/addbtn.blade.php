<script type="text/html" id="toolbarDemo">
    @can('isAdmin')
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-normal layui-btn-sm data-add-btn" lay-event="add"> {{$name}} </button>
    </div>
    @endcan
</script>
