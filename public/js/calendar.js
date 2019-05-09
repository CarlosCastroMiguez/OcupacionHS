document.addEventListener('DOMContentLoaded', function () {


    var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear()

    var calendarEl = document.getElementById('calendar');

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
        eventBackgroundColor: "#E3FA9B",
        eventBorderColor: "#FE5050",
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


            //si lo cambio de sala
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
        
        eventRender: function(info) {
            
            var newcontent = document.createElement('div');
            newcontent.innerHTML = info.event.extendedProps.id_simulador;

            while (newcontent.firstChild) {
                info.el.appendChild(newcontent.firstChild);
            }
            
	        //console.log(info.el);
            //info.el.firstChild.innerHTML = info.event.extendedProps.id_simulador;
            
            
            //console.log(eventData.event.extendedProps.id_simulador);
            //$('#fc-title').html(eventData.event.extendedProps.id_simulador);
            //var a = eventData.event.extendedProps.id_simulador;
            //console.log(a);
            
            //document.getElementsByClassName("fc-title").html(eventData.event.extendedProps.id_simulador);
            //document.find('fc-title').html(eventData.event.extendedProps.id_simulador);
            
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

        ]


    });

    calendar.render();

});
