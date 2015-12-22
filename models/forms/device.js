/**
 * Created by zhangshaobo on 15/12/22.
 *
 * 检查device中两个表单是否合适
 */
jQuery(function(){
    document.formvalidator.setHandler('device_id',
        function (value)
        {
            regex = /^[\S]+$/;
            return regex.test(value);
        });

    document.formvalidator.setHandler('device_type',
        function (value)
        {
            regex = /^[\S]+$/;
            return regex.test(value);
        });
});