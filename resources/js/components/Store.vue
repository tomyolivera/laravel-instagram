<script>
    export default {
        name: 'Store',
        methods: {
            closeModal(modal){
                $('#' + modal).modal('toggle');
            },
            formatDate(date){
                const d = new Date(date);
                return d.getDate() + '/' + (d.getMonth() + 1)  + '/' + d.getFullYear();
            },
            showMsg(field, msg = ""){
                $("#" + field + "_msg").html(msg);
            },
        }
    }
</script>