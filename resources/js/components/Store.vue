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
            showMsg(field, msg = "", state = true){
                state 
                ? $("#" + field + "_msg").html(msg).addClass("text-green-500").removeClass("text-red-500")
                : $("#" + field + "_msg").html(msg).addClass("text-red-500").removeClass("text-green-500");

                setTimeout(() => {
                    $("#" + field + "_msg").html("").removeClass("text-green-500").removeClass("text-red-500");
                }, 5000);
            },
            statusBtn(btn, msg, status = true){
                $(".btn_" + btn).html(msg).attr({disabled: !status})
            },
            isDark(dark){
                dark
                ? $("*").addClass("dark")
                : $("*").removeClass("dark");
            },
            copyToClipBoard(id) {
                let aux = document.createElement("input");
                aux.setAttribute("value", document.getElementById(id).innerHTML);
                document.body.appendChild(aux);
                aux.select();
                document.execCommand("copy");
                document.body.removeChild(aux);
            },
            getPhoto(photo, obj){
                if(photo.length > 25)
                {
                    obj.photo = photo;
                    return obj.photo;
                }

                axios.get(`/user/photo/${photo}`).then((res) => {
                    obj.photo = res.config.url;
                    return obj.photo;
                });
            },
            isImage(type){
                return  type == "image/jpeg" ||
                        type == "image/jpg" || 
                        type == "image/png";
            }
        }
    }
</script>