<script>
    session = <?= json_encode($fe_session_data); ?>;
    if (window.parent) {
        window.parent.authorized(session);
    }
</script>