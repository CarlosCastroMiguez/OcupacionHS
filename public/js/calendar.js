document.addEventListener('DOMContentLoaded', function () {


    var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear()

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        locale: 'es',
        plugins: ['resourceTimeGrid', 'interaction'],
        editable: true,
        droppable: true,
        eventDurationEditable: false,
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
        eventDrop: function (eventDropInfo) {
            
            //si no lo cambio de sala
            if (eventDropInfo.newResource == null) {
                
                console.log(eventDropInfo.event.id);
                console.log('start: ' + eventDropInfo.event.start.toISOString().slice(0, -5) + 'End:' + eventDropInfo.event.end.toISOString().slice(0, -5));
                
                
            } else { //si lo cambio de sala
                
                console.log(eventDropInfo.event.id);
                console.log(eventDropInfo.newResource.id +' - '+ eventDropInfo.newResource.title);
                console.log('start: ' + eventDropInfo.event.start.toISOString().slice(0, -5) + 'End:' + eventDropInfo.event.end.toISOString().slice(0, -5));
                
            }
            
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
