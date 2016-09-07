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
    });
</script>
