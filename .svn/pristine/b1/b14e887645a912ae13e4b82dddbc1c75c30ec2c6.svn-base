define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'room_info/index' + location.search,
                    add_url: 'room_info/add',
                    edit_url: 'room_info/edit',
                    del_url: 'room_info/del',
                    multi_url: 'room_info/multi',
                    table: 'room_info',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'weigh',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'room_class_id', title: __('Room_class_id')},
                        {field: 'room_label_ids', title: __('Room_label_ids')},
                        {field: 'room_title', title: __('Room_title')},
                        {field: 'room_desc', title: __('Room_desc')},
                        {field: 'online_number', title: __('Online_number')},
                        {field: 'room_status', title: __('Room_status'), searchList: {"1":__('Room_status 1'),"2":__('Room_status 2')}, formatter: Table.api.formatter.status},
                        {field: 'password', title: __('Password')},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'weigh', title: __('Weigh')},
                        {field: 'is_hot', title: __('Is_hot'), searchList: {"0":__('Is_hot 0'),"1":__('Is_hot 1')}, formatter: Table.api.formatter.normal},
                        {field: 'roomclass.name', title: __('Roomclass.name')},
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