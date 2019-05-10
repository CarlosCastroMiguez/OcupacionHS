document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var simuladores = [];
    //antes de cargar el calendario guardamos las tuplas de idy nombre de simulador en un array.
    //Esto lo hacemos para evitar que por cada evento se realice una consulta a la BBDD.
    //Pasamos esta variable a la funcion eventRender
    $.get('/api/simuladores', function (data) {

        for (var i = 0; i < data.length; i++) {
            var simulador = [data[i].id, data[i].nombre];
            simuladores.push(simulador);
        }
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        locale: 'es',
        plugins: ['resourceTimeGrid', 'interaction', 'dayGrid'],
        editable: true,
        droppable: true,
        eventDurationEditable: false,
        timeZone: 'local',
        defaultView: 'resourceTimeGridDay',
        allDaySlot: false,
        minTime: "08:00:00",
        maxTime: "23:00:00",
        eventBackgroundColor: "#EAEAEA",
        eventBorderColor: "#000000",
        eventLimit: true,
        eventLimitText: "Eventos, haz click aquí",
        slotLabelInterval: '00:30:00',
        slotDuration: '00:30:00',
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },
        views: {
            resourceTimeGridDay: {
                buttonText: 'Día'
            },
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'resourceTimeGridDay,dayGridMonth'
        },
        eventDrop: function (eventDropInfo) {

            var evento_id = eventDropInfo.event.id;
            var evento_name = eventDropInfo.event.title;
            /*
            var evento_start = eventDropInfo.event.start.toISOString();
            var evento_end = eventDropInfo.event.end.toISOString().slice(0, -5);
            */

            var tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
            var evento_start = (new Date(eventDropInfo.event.start - tzoffset)).toISOString().slice(0, -5);
            var evento_end = (new Date(eventDropInfo.event.end - tzoffset)).toISOString().slice(0, -5);



            $('#evento_id').val(evento_id);
            $('#evento_name').val(evento_name);
            $('#evento_start').val(evento_start);
            $('#evento_end').val(evento_end);


            //si no lo cambio de sala
            if (eventDropInfo.newResource == null) {

                document.getElementById("nombre_sala").style.visibility = "hidden";
                document.getElementById("titulo_sala").style.visibility = "hidden";

            } else {

                document.getElementById("nombre_sala").style.visibility = "visible";
                document.getElementById("titulo_sala").style.visibility = "visible";

                var id_sala = eventDropInfo.newResource.id;
                var nombre_sala = eventDropInfo.newResource.title;

                $('#id_sala').val(id_sala);
                $('#nombre_sala').val(nombre_sala);
            }

            $('#modalDropEvent').modal('show');

            /*
            if (!confirm("Are you sure about this change?")) {
                eventDropInfo.revert();
            }
            */

        },
        eventClick: function (info) {
            var eventObj = info.event;
            location.href = "/ver/" + eventObj.id;
        },
        //Por cada evento que renderizamos agregamos la siguiente información
        eventRender: function (info) {
            
            //$(info.el).tooltip({title: info.event.title});
            
            //creamos una variable simulador
            var nombre_sim = '';
            //por cada elemento/conjunto en el array simuladores (Este array lo cargamos antes que el calendario)
            for (var i = 0; i < simuladores.length; ++i) {
                //Si el primer valor de la tupla es igual al id del simulador del evento en el que estamos:
                if (simuladores[i][0] == info.event.extendedProps.id_simulador) {
                    //guardamos en la varable nombre_sim el nombre de dicho simulador.
                    nombre_sim = simuladores[i][1];

                }
            }
            //creamos un nuevo elemento con el valor del nombre y lo agregamos al evento
            var newcontent = document.createElement('div');
            newcontent.innerHTML = nombre_sim;
            //Mientras tenga un valor lo agregamos al HTML (Siempre tiene valor "simulador por defecto")
            while (newcontent.firstChild) {
                info.el.appendChild(newcontent.firstChild);
            }
        },

        resources: '/api/resources/salas',
        eventSources: [
            //psicologia ciclos form 
            {
                url: '/api/eventosFisioterapia/calendar',
                color: '#FFFFFF',
                borderColor: 'red'
            },
            {
                url: '/api/eventosEnfermeria/calendar',
                color: '#00CBFF',
                borderColor: 'red'
            },
            {
                url: '/api/eventosFarmacia/calendar',
                color: '#AA1C47',
                borderColor: 'red'
            },
            {
                url: '/api/eventosMedicina/calendar',
                color: '#84FC9F',
                borderColor: 'red'
            },
            {
                url: '/api/eventosOdontologia/calendar',
                color: '#0043E2',
                borderColor: 'red',
                textColor: 'white'
            },
            {
                url: '/api/eventosPsicologia/calendar',
                color: '#C3C0C0',
                borderColor: 'red'
            },
            {
                url: '/api/eventosCiclos/calendar',
                color: '#FC9900',
                borderColor: 'red'
            },
            {
                url: '/api/eventosOtros/calendar',
                color: '#FCFC00',
                borderColor: 'red'
            },
            
        ]


    });

    calendar.render();

});
