define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'gift_log/index' + location.search,
                    add_url: 'gift_log/add',
                    edit_url: 'gift_log/edit',
                    del_url: 'gift_log/del',
                    multi_url: 'gift_log/multi',
                    table: 'gift_log',
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
                        {field: 'send_user_id', title: __('Send_user_id')},
                        {field: 'receive_user_id', title: __('Receive_user_id')},
                        {field: 'gift_id', title: __('Gift_id')},
                        {field: 'gift_name', title: __('Gift_name')},
                        {field: 'gaft_price', title: __('Gaft_price'), operate:'BETWEEN'},
                        {field: 'true_price', title: __('True_price'), operate:'BETWEEN'},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'gift.name', title: __('Gift.name')},
                        {field: 'user.username', title: __('User.username')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
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