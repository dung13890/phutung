@extends('layouts.menu.index')

@include('backend.menu._edit')

@push('menu.left')
<div class="box-body">
    <div class="block-style" id="list"></div>
    <hr>
    <div class="form-group">
        <a href="#" class="btn btn-success btn-sm save-menu" ><i class="fa fa-check"></i> Save</a>
    </div>
</div>
@endpush

@push('menu.right')
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#link" data-toggle="tab" >Link</a></li>
        <li><a href="#post" data-toggle="tab" >Post</a></li>
        <li><a href="#page" data-toggle="tab" >Page</a></li>
        <li><a href="#product" data-toggle="tab" >Product</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active block-style" id="link">
            @include('backend.menu._link')
        </div>
        <div class="tab-pane block-style" id="post">
            @include('backend.menu._select',['listSelect'=>$categoryPost])
        </div>
        <div class="tab-pane block-style" id="page">
            @include('backend.menu._select',['listSelect'=>$pages])
        </div>
        <div class="tab-pane block-style" id="product">
            @include('backend.menu._select',['listSelect'=>$categoryProduct])
        </div>

        <hr>
        <div class="form-group">
            <a href="#" class="btn btn-primary btn-sm create-menu" ><i class="fa fa-hand-o-left"></i> Create Menu</a>
            <a href="#" class="btn btn-success btn-sm save-menu pull-right" ><i class="fa fa-check"></i> Save</a>
        </div>
    </div>
</div>
@endpush

@push('prescripts')
<script>
    var menus = {!! $items->toJson() !!};
    var treeOptions = {
        onCanMoveTo: function(moved_node, target_node, position) {
            if (position == 'inside' && !moved_node.children.length && !target_node.parent.id) {
                return true;
            }
            if (position == 'after') {
                return true;
            }

        },
        onCreateLi: function(node, $li) {
            $li.find('.jqtree-element')
            .append('<div class="btn-group pull-right tools">\
                <a href="#edit-menu" data-toggle="modal" data-id="'+node.id+'" data-name="'+node.name+'" data-src="'+node.src+'" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>\
                <a href="'+laroute.route('backend.menu.destroy', {menu: node.id})+'" class="btn btn-xs btn-danger handle-delete"><i class="fa fa fa-trash-o"></i></a>\
            </div>');
        }
    };
    $(function () {
        treeInit(menus, treeOptions, true);
        $('.create-menu').on('click', function (e) {
            e.preventDefault();
            var tab = $('.tab-pane.active').attr('id');
            var value = [];
            if (tab != 'link') {
                $('#' + tab).find('input[type="checkbox"]').each(function () {
                    if (this.checked) {
                        value.push({
                            'id':$(this).val(),
                            'name': $(this).parent().siblings('input').val()
                        });
                    }
                });
            } else {
                value.push({
                    'name': $('#' + tab).find('input[name="name"]').val(),
                    'src' : $('#' + tab).find('input[name="src"]').val()
                });
            }
            if (value.length) {
                $.post(laroute.route('backend.menu.store'), {type:tab, value:value}, function (result) {
                    $('#list').tree('loadData', result);
                });
            }
        });

        $('.save-menu').on('click', function (e) {
            e.preventDefault();
            var serialize = $('#list').tree('toJson');
            $.post(laroute.route('backend.menu.serialize'), {serialize}, function () {
                window.location.reload();
            });
        });

        $('.handle-delete').on('click', function (e) {
            e.preventDefault();
            alertDestroy($(this).attr('href'));
        });

        $('#edit-menu').on('show.bs.modal', function (event) {
            var id = $(event.relatedTarget).data('id');
            var name = $(event.relatedTarget).data('name');
            var src = $(event.relatedTarget).data('src');
            $(this).find('form').attr('action',laroute.route('backend.menu.update',{menu:id}));
            $(this).find('input[name="name"]').val(name);
            $(this).find('input[name="src"]').val(src);

        })
    });
</script>
@endpush