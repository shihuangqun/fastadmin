define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'user_card/index' + location.search,
                    add_url: 'user_card/add',
                    edit_url: 'user_card/edit',
                    del_url: 'user_card/del',
                    multi_url: 'user_card/multi',
                    table: 'user_card',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'card', title: __('Card')},
                        {field: 'mobile', title: __('Mobile')},
                        {field: 'userid', title: __('Userid')},
                        {field: 'status', title: __('Status'), searchList: {"0":__('Status 0'),"1":__('Status 1')}, formatter: Table.api.formatter.status},
                        {field: 'user.level_charm_id', title: __('User.level_charm_id')},
                        {field: 'user.username', title: __('User.username')},
                        {field: 'user.avatar', title: __('User.avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'user.level', title: __('User.level')},
                        {field: 'user.gender', title: __('User.gender')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate},
                        // {
                        //     field: 'operate', title: __('审核'), table: table,
                        //     buttons: [
                        //         {name: 'detail', text: '√️', title: '√', icon: '', classname: 'btn btn-xs btn-primary btn-dialog', url: 'game/roundmodel/draw'},
                        //         {name: 'detail', text: '❌', title: '❌', icon: '', classname: 'btn btn-xs btn-primary btn-dialog', url: 'game/roundmodel/draw'}
                        //     ], // 添加按钮， btn-dialog 新建页面 btn-ajax ajax异步请求
                        //     events: Table.api.events.operate, formatter: Table.api.formatter.buttons
                        // },
                        {
                            field: 'buttons',
                            width: "120px",
                            title: __('审核'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons: [
                                {
                                    name: 'ajax',
                                    text: __('️√️'),
                                    title: __('√️'),
                                    classname: 'btn btn-xs btn-primary btn-magic btn-ajax',
                                    // icon: 'fa fa-magic',
                                    url: 'example/bootstraptable/detail',
                                    confirm: '确认审核通过',
                                    success: function (data, ret) {
                                        // Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        // console.log(data.id);
                                        $.ajax({
                                            type:'post',
                                            data:{id:data.id},
                                            dataType:'json',
                                            url:'/api/roomnocert/examine',
                                            success: function(data){
                                                console.log(data);
                                                if(data.code == 1){
                                                    Toastr.info(data.msg);
                                                    setTimeout(function(){
                                                        location.reload()
                                                    },1500)
                                                }
                                            }
                                        })
                                        //如果需要阻止成功提示，则必须使用return false;
                                        return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },
                                {
                                    name: 'ajax',
                                    text: __('️❌'),
                                    title: __('❌️'),
                                    classname: 'btn btn-xs btn-primary btn-magic btn-ajax',
                                    // icon: 'fa fa-magic',
                                    url: 'example/bootstraptable/detail',
                                    confirm: '确认拒绝吗',
                                    success: function (data, ret) {
                                        Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },

                            ],
                            formatter: Table.api.formatter.buttons
                        }
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },

        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});