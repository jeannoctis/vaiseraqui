<script>
      
       var array = [<? if($datasOcupada) { foreach($datasOcupada as $ocupada) { ?>"<?=$ocupada->dataConcat?>",<? } } ?>"<?=date("d/m/Y")?>"]; // ["01/10/2023","02/10/2023","03-10-2023","05-10-2023"];
                $(function() {           
                        from = $("#desktop-table-checkin")
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
                            setTimeout(() => {
    calcularTotal('<?=$tipopagina?>','desktop');
}, "500");
                          
                    $("#desktop-table-checkout").val($("#desktop-table-checkin").val());
                    $("#desktop-table-checkout").removeAttr('disabled');
                   //     to.datepicker("option", "minDate", getDate(this));
           $("#desktop-table-checkout").datepicker(
                    "change",
                    { minDate: new Date( FormataStringData($('#desktop-table-checkin').val())) }
            );
                        }),
                        to = $("#desktop-table-checkout").datepicker({
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
                            calcularTotal('<?=$tipopagina?>','desktop');
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
                
                     $(function() {           
                        from = $("#mobile-table-checkin")
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
                            setTimeout(() => {
    calcularTotal('<?=$tipopagina?>','mobile');
}, "500");
                          
                    $("#mobile-table-checkout").val($("#mobile-table-checkin").val());
                    $("#mobile-table-checkout").removeAttr('disabled');
                   //     to.datepicker("option", "minDate", getDate(this));
           $("#desktop-table-checkout").datepicker(
                    "change",
                    { minDate: new Date( FormataStringData($('#mobile-table-checkin').val())) }
            );
                        }),
                        to = $("#mobile-table-checkout").datepicker({
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
                            calcularTotal('<?=$tipopagina?>','mobile');
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