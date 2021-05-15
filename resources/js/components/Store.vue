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
            },
            firstLetterUpper(string){
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            splitString(string, where = false){
                let arr = [], 
                    words = string.split(','),
                    template = ``;

                words.forEach(element => {
                    arr.push(this.firstLetterUpper(element));
                });

                for (let i = 0; i < arr.length; i++){
                    template +=
                        i > 0 
                            ? '<p>' + arr[i] + '</p>'
                            : arr[i]
                }

                if(!where) return template;
                else $(where).html(template);
            },
            searchInArray(toSearch, arr){
                let i = 0, found = false;

                while (i < arr.length && !found) {
                    if(arr[i].name == toSearch){
                        found = true;
                    }

                    i++;
                }

                return found;
            },
            /**
             *  @param string $pie *Options for type: pie, doughnut, bar, line, radar, polarArea, bubble, scatter*
             */
            makeChart(id, labels, dataS, color, type = "pie"){

                const canvas = $("#" + id);
                var data = {
                    labels: labels,
                    datasets: [{
                        data: dataS,
                        backgroundColor: color
                    }]
                };

                return new Chart(canvas, {
                    type: type,
                    data: data
                });
            },
            destroyTable(table){
                $("#table_"+table).DataTable
            },
            drawTable(table){
                this.destroyTable(table);

                $("#table_"+table).DataTable({
                    dom: 
                        "B<'row'<'mt-2 col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
                    ,
                    buttons: [
                        {
                            "extend": "copyHtml5",
                            "text": "<i class='fas fa-copy'></i> Copy",
                            "titleAttr": "Copy to clipboard",
                            "className": "btn btn-primary"
                        },
                        {
                            "extend": "excelHtml5",
                            "text": "<i class='fas fa-file-excel'></i> Excel",
                            "titleAttr": "Export to Excel",
                            "className": "btn btn-success"
                        },
                        {
                            "extend": "pdfHtml5",
                            "text": "<i class='fas fa-file-pdf'></i> PDF",
                            "titleAttr": "Export to PDF",
                            "className": "btn btn-danger"
                        },
                        {
                            "extend": "csvHtml5",
                            "text": "<i class='fas fa-file-csv'></i> CSV",
                            "titleAttr": "Export to CSV",
                            "className": "btn btn-secondary"
                        },
                        {
                            "extend": "print",
                            "text": "<i class='fas fa-print'></i> Print",
                            "titleAttr": "Print",
                            "className": "btn btn-warning"
                        },
                    ],
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "All"]],
                });
            },
        }
    }
</script>