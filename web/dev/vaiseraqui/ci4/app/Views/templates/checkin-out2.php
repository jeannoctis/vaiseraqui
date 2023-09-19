<script>     
    <?  $i = 1;
    while($i <= 3 ) {?>
       var array = [];
                $(function() {           
                        from = $("#checkin<?=$i?>")
                        .datepicker({
                        dateFormat: 'dd/mm/yy',
                                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                nextText: 'Proximo',
                                prevText: 'Anterior',
                                minDate: '+1d',
                                 beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('dd/mm/yy', date);
            return [ array.indexOf(string) == -1 ]
        }
                        })
                        .on("change", function() {
                                             
                    $("#checkout<?=$i?>").val($("#checkin<?=$i?>").val());
                    $("#checkout<?=$i?>").removeAttr('disabled');
                   //     to.datepicker("option", "minDate", getDate(this));
           $("#checkout<?=$i?>").datepicker(
                    "change",
                    { minDate: new Date( FormataStringData($('#checkin<?=$i?>').val())) }
            );
                        }),
                        to = $("#checkout<?=$i?>").datepicker({
                dateFormat: 'dd/mm/yy',
               dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
               dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
               dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
               monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
               monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
               nextText: 'Proximo',
               prevText: 'Anterior',
                minDate: '+1d',
                                   beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('dd/mm/yy', date);
            return [ array.indexOf(string) == -1 ]
        }
                })
                        .on("change", function() {
                        //    calcularTotal('<?=$tipopagina?>','desktop');
                       // from.datepicker("option", "maxDate", getDate(this));
                        });
                function getDate(element) {
                var date;
                try {
                date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                date = null;
                }

                return date;
                }
                });            
    </script>
    <? $i++; } ?>