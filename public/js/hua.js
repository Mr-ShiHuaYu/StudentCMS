// 全局设置ajax,csrf,让提示更加个性化
layui.use("jquery", function() {
    var $ = layui.jquery;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            var status = XMLHttpRequest.status;
            var responseText = XMLHttpRequest.responseText;
            var msg = '不好，有错误';
            switch (status) {
                case 400:
                    msg = responseText !== '' ? responseText : '失败了';
                    break;
                case 401:
                    msg = responseText !== '' ? responseText : '你没有权限';
                    break;
                case 403:
                    msg =  '你没有权限执行此操作!';
                    break;
                case 404:
                    msg = '你访问的操作不存在';
                    break;
                case 406:
                    msg = '请求格式不正确';
                    break;
                case 410:
                    msg = '你访问的资源已被删除';
                    break;
                case 422:
                    var errors = $.parseJSON(XMLHttpRequest.responseText);

                    if (errors instanceof Object) {
                        var m = '';
                        $.each(errors, function(index, item) {
                            if (item instanceof Object) {
                                $.each(item, function(index, i) {
                                    m = m + i + '<br>';
                                });
                            }
                        });
                        msg = m;
                    }
                    break;
                case 429:
                    msg = '超出访问频率限制';
                    break;
                case 500:
                    msg = '500服务器内部错误';
                    break;
                default:
                    return true;
            }

            layer.msg(msg, {time: 3000, icon: 5});
        }
    });
});

// 自己封装layer.open,这样封装的原因是,不想改原项目的代码,如果写在某个js里,通过layui加载的话,需要在每个页面中layui.use这个js
;!function (win) {
    var hua = function () {
    };
    win.hua = new hua();

    layui.use(['jquery','miniAdmin'], function () {
        var miniAdmin = layui.miniAdmin;
        var area = null;
        /**
         * 如果是手机端,默认弹出的是100%,如果不是,默认是宽高都是80%
         * @param title
         * @param url
         * @param w
         * @param h
         */
        hua.prototype.open = function (title, url, w, h) {
            if (title == null || title === '') {
                title = false;
            }
            if (url == null || url === '') {
                url = "/404";
            }
            if (w == null || w === '') {
                // 宽度默认80%
                w = 80;
            }
            if (h == null || h === '') {
                // 高度默认80%
                h = 80;
            }
            var openOptions = {
                title: title,
                type: 2,
                fix: false,
                maxmin: true,
                area: miniAdmin.checkMobile() ? ['100%', '100%'] : [w + '%', h + '%'],
                shadeClose: true,
                shade: 0.4,
                content: url
            };
            layer.open(openOptions);
        };
    });

}(window);
