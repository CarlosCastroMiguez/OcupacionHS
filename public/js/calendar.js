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
        eventBorderColor : "#FE5050",
        views: {
            resourceTimeGridDay: {
                buttonText: 'Día'
            },
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'resourceTimeGridDay dayGridMonth'
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

        resources: '/api/resources/salas',
        events: 'api/eventos/calendar'
        //format start: "2019-04-19T07:30:00+00:00",
    });


    calendar.render();

    var calendarEl2 = document.getElementById('calendar2');
    var calendar2 = new FullCalendar.Calendar(calendarEl2, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        locale: 'es',
        plugins: ['resourceTimeGrid'],
        timeZone: 'local',
        defaultView: 'resourceTimeGridDay',
        allDaySlot: false,
        views: {
            resourceTimeGridDay: {
                buttonText: 'Día'
            },
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'resourceTimeGridDay'
        },

        resources: '/api/resources/salas',
        events: 'api/eventos/calendar'
        //format start: "2019-04-19T07:30:00+00:00",
    });

    calendar2.gotoDate(currentDate);


    calendar2.render();
});
