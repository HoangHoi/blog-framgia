<!-- Jquery -->
{!! Html::script('lib/jquery/jquery-2.2.0.min.js') !!}

<!-- Bootstrap -->
{!! Html::script('lib/bootstrap/js/bootstrap.min.js') !!}

<!-- My script -->
{!! Html::script('js/myscript.js') !!}

<script>
    $(document).ready(function () {
        var Entry = new entry();
        Entry.init('{!! route("entry.store") !!}');
        var EntryEdit = new entryEdit();
        EntryEdit.setPreUrl('{!! asset("entry") !!}');
        $('.delete_button').on('click', function () {
            $(this).parent().find('form').submit();
        });
        $('.publish_button').on('click', function () {
            $(this).parent().find('form').submit();
        });
        $('.edit_button').on('click', function () {
            var entry_id = $(this).data('entry-id');
            $('#entry_content_' + entry_id).hide();
            $('#entry_form_' + entry_id).show();
        });
        $('.entry_form').on('click', '.close', function () {
            var entry_id = $(this).data('entry-id');
            $('#entry_content_' + entry_id).show();
            $('#entry_form_' + entry_id).hide();
        });
        $('.btn_save').on('click', function () {
            var entry_id = $(this).data('entry-id');
            EntryEdit.save(entry_id);
        });
        $('.btn_publish').on('click', function () {
            var entry_id = $(this).data('entry-id');
            EntryEdit.publish(entry_id);
        });
    });
</script>
